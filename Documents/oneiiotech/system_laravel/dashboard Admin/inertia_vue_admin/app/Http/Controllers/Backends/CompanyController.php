<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function index(Request $r){
        // if(!checkPermission('company_info','view')){
        //     return redirect()->route('admin.404');
        // }
        $data['company'] = DB::table('companies')->find(1);
        return Inertia::render('backends/companies/index', $data);
    }
    public function update(Request $r){
        if(!checkPermission('company_info','edit')){
            return redirect()->route('admin.404');
        }
        $data = $r->except('_token','logo');
        if($r->hasFile('logo')){
            $data['logo'] = storeFile($r->file('logo'),"companies");
        }
        $i = DB::table('companies')->where('id',1)->update($data);
        if($i){
            return redirect()->back()->with('success',__('Update Succesfully'));
        } else {
            return redirect()->back()->with('error',__('Nothing Update'));
        }
    }
}
