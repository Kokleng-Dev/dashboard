<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App;

class ChangeLanguageController extends Controller
{
    public function index(){
        $user = session()->get('user');
        $userDB = DB::table('users')->find($user->id);
        $lng = $userDB->language == 'en' ? 'kh' : 'en';
        DB::beginTransaction();
        try {
            DB::table('users')->where('id',$user->id)->update([
                'language' => $lng
            ]);
            session()->forget('language');
            DB::commit();

            session()->put('language', $lng);
            App::setLocale(session()->get('language'));

            // all good
            return redirect()->back()->with('success',__('Update Successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
