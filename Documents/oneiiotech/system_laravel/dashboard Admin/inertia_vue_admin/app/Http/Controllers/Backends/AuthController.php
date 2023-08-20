<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(Request $r){
        if(session()->has('user')){
            return redirect()->route('admin.home');
        }
        if($r->isMethod('post')){
            $user = DB::table('users')->where('username',$r->username)->first();
            if(!$user || $user->active == 0){
                return redirect()->back()->with('error',__('User not found'));
            }
            if (!Hash::check($r->password, $user->password)) {
                return redirect()->back()->with('error',__('Password not match'));
            }     
            if(!session()->put('user', $user)){
                session()->put('language', $user->language);
                return redirect()->route('admin.home')->with('success',__('Login Sucessfully'));
            }
        }
        return Inertia::render('backends/auth/login');
    }
    public function logout(){
        if(!session()->forget('user')){
            return redirect()->route('admin.login')->with('success',__('Logout Successfully'));
        }
    }
    public function aboutMe(){
        if(!checkPermission('about_me','view')){
            return redirect()->route('admin.404');
        }
        $user_id = session()->get('user')->id;
        $data['user'] = DB::table('users')
                            ->where('users.id',$user_id)
                            ->join('roles','roles.id','users.role_id')
                            ->select('users.*','roles.name as role_name')
                            ->first();

        // return view('backends.auths.about_me', $data);
        return Inertia::render('backends/about_me/index', $data);
    }
    public function updateAboutMe(Request $r){
        if(!checkPermission('about_me','edit')){
            return redirect()->back()->with('error',__("No Permission"));
        }
        $user_id = session()->get('user')->id;
        $user = DB::table('users')->find($user_id);
        $data = $r->except('_token','old_password','password','photo');

        if($r->old_password){
            if($r->password){
                if (!Hash::check($r->old_password, $user->password)) {
                    return redirect()->back()->withInput()->with('error',__('Password Not Match'));
                }
                $data['password'] = Hash::make($r->password);
            } else {
                return redirect()->back()->withInput()->with('error',__('New Password is Required'));
            }
        }
        if($r->hasFile('photo')){
            $data['photo'] = storeFile($r->file('photo'),"profile");
            if(checkHasFile($user->photo)){
                unlinkFile($user->photo);
            }
        }


        $update = DB::table('users')->where('id',$user->id)->update($data);
        if($update){
            return redirect()->back()->with('success',__('Update Successfully'));
        } else {
            return redirect()->back()->with('error',__('Update Unsuccessfully'));
        }

        return view('backends.auths.about_me', $data);
    }
}
