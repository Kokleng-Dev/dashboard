<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;


class UserController extends Controller
{
    public function index(Request $r){
        if(!checkPermission('user','view')){
            return redirect()->route('admin.404')->with('error', __('You have no permission to access this path.'));
        }
        if(!requestInertia($r) && $r->ajax()){
            $data = DB::table('users')
                ->where('users.active', 1)
                ->join('roles','roles.id','users.role_id');

            if(session()->get('user')->role_id != 1){
                $data = $data->where('users.role_id','!=',1);
            }
            $data = $data->select('users.*','roles.name as role_name');
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btns = btn_actions('users',$row,'user');
                        return $btns;
                    })
                    ->addColumn('photo_user', function($row){
                        $photo = '';
                        if(checkHasFile($row->photo)){
                            $photo = '<img src="'.getFile($row->photo).'" alt="" class="rounded-circle m-auto border border-4" width="30" height="30">';
                        } else {
                            $photo = '<img src="'.asset('assets/images/icon.jpeg').'" alt="" class="rounded-circle m-auto border border-4" width="30" height="30">';
                        }
                        return $photo;
                    })
                ->rawColumns(['action','photo_user'])
               	->make(true);
        }
        $roles = DB::table('roles')->where('active',1);
        if(session()->get('user')->role_id != 1){
            $roles = $roles->where('roles.id','!=',1);
        }
        $data['roles'] = $roles->get();
        
        inertiaSharePermission('user',['create','edit','delete']);
        return Inertia::render('backends/users/index',$data);
    }
    public function update(Request $r){
        $tbl = base64Decode($r->tbl);
        $per = base64Decode($r->per);
        $id = base64Decode($r->eid);
        if($tbl == 0 || $per == 0 || $id == 0){
            return redirect()->back()->with('error', __('Update Unsuccessfully'));
        }
        $data = $r->except('_token','tbl','per','photo','eid','password');
        if($r->password){
            $data['password'] = Hash::make($r->password);
        }
        if($r->photo){
            $data['photo'] = storeFile($r->file('photo'),"profile");
            $user = DB::table('users')->find($id);
            if(checkHasFile($user->photo)){
                unlinkFile($user->photo);
            }
        }
        DB::beginTransaction();
        try {
            $update = DB::table('users')->where('id',$id)->update($data);
            DB::commit();
            // all good
            return redirect()->back()->with('success', __('Update Successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->with('success', __('Update Unsuccessfully'));
        }
    }
    public function store(Request $r){
        if($r->ajax()){
            $per = base64Decode($r->per);
            $tbl = base64Decode($r->tbl);
            if($per == 0 || $tbl == 0){
                return redirect()->back()->with('error',__('Create Unsuccessfully'));
            }
            $data = $r->except('_token','tbl','per','photo','password');
            if($r->password){
                $data['password'] = Hash::make($r->password);
            }
            if($r->photo){
                $data['photo'] = storeFile($r->file('photo'),"profile");
            }
            DB::beginTransaction();
            try {
                $i = DB::table('users')->insert($data);
                DB::commit();
                // all good
                return redirect()->back()->with('success', __('Create Successfully'));
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                return redirect()->back()->with('error', __('Create Unsuccessfully'));
            }
        }
    }
}