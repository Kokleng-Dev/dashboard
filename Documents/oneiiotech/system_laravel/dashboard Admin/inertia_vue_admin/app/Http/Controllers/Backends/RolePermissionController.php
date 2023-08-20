<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Inertia\Inertia;

class RolePermissionController extends Controller
{
    public function index(Request $r, $id){
        if(!checkPermission('role','permission')){
            return page404();
        }
        $id = base64Decode($id);
        if($id == 0){
            return redirect()->back()->with('error', __('View Fail'));
        }
        $role = DB::table('roles')->find($id);
        $condition = session()->get('user')->role_id == 1 ? '' : "AND permissions.id NOT IN (1,3)";

        $role_permissions = DB::select("
            SELECT tb.id as role_permission_id, tb.permission_feature_id ,permissions.name as permission_name, 
            permissions.key, permissions.id as permission_id 
            FROM permissions 
            LEFT JOIN (SELECT * FROM role_permissions WHERE role_id={$id} AND active = 1) tb ON permissions.id = tb.permission_id 
            WHERE permissions.active = 1 $condition ORDER BY permissions.id asc
        ");
        $permission_features = DB::table('permission_features')->where('active',1)->get();

        $data['role_permissions'] = $role_permissions;
        $data['role'] = $id;

        inertiaSharePermission('role_permission',['edit']);
        return Inertia::render('backends/role_permissions/index',$data);
    }

    public function changePermission(Request $r, $condition){
        if(!checkPermission('role','edit_permission')){
            return response()->json(['status' => 0, 'sms' => __('No Permission')]);
        }
        $role_permission_id = $r->role_permission_id == 0 ? base64Decode($r->role_permission_id) : $r->role_permission_id;
        $feature_id = base64Decode($r->feature_id);
        $permission_feature_id = base64Decode($r->permission_feature_id);
        $permission_id = base64Decode($r->permission_id);
        $role_id = base64Decode($r->role_id);

        if($feature_id == 0 || $permission_feature_id == 0 || $permission_id == 0 || $role_id == 0){
            return response()->json(['status' => 0, 'sms' => __('Update Fail')]);
        }

        DB::beginTransaction();
        try {
            $checkhasPermission = DB::table('role_permissions')->where(['active' => 1, 'role_id' => $role_id, 'permission_id' => $permission_id])->first();
            if($role_permission_id == 0 && !$checkhasPermission){
                $features = [];
                array_push($features, $feature_id);                
                DB::table('role_permissions')->insert([
                    'role_id' => $role_id,
                    'permission_id' => $permission_id,
                    'permission_feature_id' => json_encode($features),
                ]);
            } else {
                if($condition == 0){
                    $features = json_decode($checkhasPermission->permission_feature_id);
                    $newFeatures = [];
                    foreach ($features as $key => $value) {
                        if($value != $feature_id){
                            array_push($newFeatures,$value);
                        }
                    }
                    DB::table('role_permissions')->where('id',$checkhasPermission->id)->update([
                        'permission_feature_id' => json_encode($newFeatures)
                    ]);
                } else {
                    $features = json_decode($checkhasPermission->permission_feature_id);
                    array_push($features, $feature_id);
                    DB::table('role_permissions')->where('id',$checkhasPermission->id)->update([
                        'permission_feature_id' => json_encode($features)
                    ]);
                }
            }

            DB::commit();
            // all good
            return response()->json(['status' => 1, 'sms' => __('Update Successfully')]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 0, 'sms' => $e->getMessage()]);
        }

    }
}
