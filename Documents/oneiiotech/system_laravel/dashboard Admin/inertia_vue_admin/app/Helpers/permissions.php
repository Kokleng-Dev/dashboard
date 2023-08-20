<?php
use Inertia\Inertia;

function base64Encode($string){
    $key = '$2y$10$hvDxbcuGzDGC1yoxiGcAB.mSqrMZgsUBUYjewwirweUEenVY6adSa';
    $string = $string . '-|-' . $key;
    $string = base64_encode($string);
    $string = '$uGzDGC1yoxi' . '-|-' . base64_encode($string);
    $string = base64_encode($string);
    return $string;
}
function base64Decode($encode){
    $string = base64_decode($encode);
    $string = explode('-|-',$string);
    if(count($string) != 2 || $string[0] != '$uGzDGC1yoxi'){
        return 0;
    }
    $string = base64_decode(base64_decode($string[1]));
    $string = explode('-|-', $string);

    if(count($string) != 2){
        return 0;
    }

    if($string[1] != '$2y$10$hvDxbcuGzDGC1yoxiGcAB.mSqrMZgsUBUYjewwirweUEenVY6adSa'){
        return 0;
    }

    return $string[0];
}

function checkPermission($permission,$feature){
    $role_id = session()->get('user')->role_id;

    $per = DB::table('permissions')->where('key',$permission)->where('active',1)->first();
    if(!$per) return 0;


    $role_per = DB::table('role_permissions')
                ->where('permission_id',$per->id)
                ->where('active',1)
                ->where('role_id',$role_id)
                ->first();

    if(!$role_per) return 0;

    $per_feature = DB::table('permission_features')
                        ->where('permission_id',$per->id)
                        ->where('aleas',$feature)
                        ->where('active',1)
                        ->first();
    if(!$per_feature) return 0;

    $permission_feature_id = json_decode($role_per->permission_feature_id);
    $check = 0;

    foreach ($permission_feature_id as $key => $value) {
        if($value == $per_feature->id){
            $check = 1;
            break;
        }
    }
    return $check;
}

function getPermissions($feature){
    try {
        $role_id = session()->has('user') ? session()->get('user')->role_id : 1;
        $pers = DB::table('permissions')
                    ->join('role_permissions','permissions.id','role_permissions.permission_id')
                    ->where('permissions.active',1)
                    ->where('role_permissions.active',1)
                    ->where('role_permissions.role_id',$role_id)
                    ->select('permissions.*','role_permissions.permission_feature_id')
                    ->get();

        if(!$pers) return [];

        $data = ['home'];

        foreach ($pers as $key => $per) {
            $per_feature = DB::table('permission_features')
                            ->where('permission_id',$per->id)
                            ->where('aleas',$feature)
                            ->where('active',1)
                            ->first();

            if(!$per_feature) continue;

            $permission_feature_id = json_decode($per->permission_feature_id);
            foreach ($permission_feature_id as $key => $value) {
                if($value == $per_feature->id){
                    array_push($data,$per->key);
                    break;
                }
            }
        }

        return $data;
    } catch (\Throwable $th) {
        return [];
    }
}

function inertiaSharePermission($permission,$features) {
    foreach($features as $feature){
        Inertia::share($feature,checkPermission($permission,$feature));
    }
}