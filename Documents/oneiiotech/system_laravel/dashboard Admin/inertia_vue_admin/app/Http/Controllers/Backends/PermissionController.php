<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Inertia\Inertia;

class PermissionController extends Controller
{
    public function index(Request $r){
        if(!checkPermission('permission','view')){
            return page404();
        }
        if($r->ajax() && !requestInertia($r)){
            $data = DB::table('permissions')
                ->where('permissions.active', 1);
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btns = btn_actions('permissions',$row,'permission');
                        $btnFeature = '';
                        if(checkPermission('permission_feature','view')){
                            $btnFeature = '<a href="'. route('admin.permission_feature',base64Encode($row->id)) .'" class="btn btn-outline-primary btn-sm"><i class="bi bi-eyeglasses"></i> '.__("Feature").'</a>';
                        }
                        return $btnFeature . ' ' . $btns;
                    })
                ->rawColumns(['action'])
               	->make(true);
        }
        return Inertia::render('backends/permissions/index');
    }
}
