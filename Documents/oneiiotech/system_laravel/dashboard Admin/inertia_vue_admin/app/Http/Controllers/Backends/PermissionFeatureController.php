<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Inertia\Inertia;


class PermissionFeatureController extends Controller
{
    public function index(Request $r, $id){
        // if(!checkPermission('permission_feature','view')){
        //     return redirect()->route('admin.404');
        // }
        // $id = base64Decode($id);
        // if($id == 0){
        //     return redirect()->back()->with('error', __('View Fail'));
        // }
        // if($r->ajax()){
        //     $data = DB::table('permission_features')
        //         ->where('permission_features.active', 1)
        //         ->where('permission_features.permission_id',$id);
        //         return DataTables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){
        //                 $btns = btn_actions('permission_features',$row,'permission_feature');
        //                 return $btns;
        //             })
        //         ->rawColumns(['action'])
        //        	->make(true);
        // }
        // $data['permission'] = DB::table('permissions')->find($id);
        return Inertia::render('backends/permissions/features.index');
    }
}
