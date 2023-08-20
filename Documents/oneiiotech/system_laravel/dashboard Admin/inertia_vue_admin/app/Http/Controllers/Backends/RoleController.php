<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index(Request $r){
        if(!checkPermission('role','view')){
            return redirect()->route('admin.404')->with('error', __('You are no permission to access this path.'));
        }
        if($r->ajax() && !requestInertia($r)){
            $data = DB::table('roles')
                ->where('roles.active', 1);
            if(session()->get('user')->role_id != 1){
                $data = $data->where('roles.id','!=',1);
            }
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btns = btn_actions('roles',$row,'role');
                        $btnView = '<button type="button" attr-id="'. base64Encode($row->id) .'" class="btn btn-outline-primary btn-sm permission"><i class="bi bi-eyeglasses"></i> '.__("Permission").'</button>';

                        return $btnView . ' ' . $btns;
                    })
                ->rawColumns(['action'])
               	->make(true);
        }
        inertiaSharePermission('role',['create','edit','delete']);
        return Inertia::render('backends/roles/index');
    }
}
