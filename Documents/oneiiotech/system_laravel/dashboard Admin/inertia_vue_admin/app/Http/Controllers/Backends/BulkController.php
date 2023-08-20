<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Schema;

class BulkController extends Controller
{
    public function detail($tbl,$id){
        $tbl = base64Decode($tbl);
        $id = base64Decode($id);
        if($tbl == 0 || $id == 0){
            return response()->json(['status' => 0, 'sms' => __('Fail')]);
        }
        $data = DB::table($tbl)->find($id);
        if($data){
            return response()->json(['status' => 1, 'data' => base64Encode(json_encode($data))]);
        } else {
            return response()->json(['status' => 1, 'sms' => __('Fail')]);
        }
    }
    public function store(Request $r){
        $tbl = base64Decode($r->tbl);
        $per = base64Decode($r->per);
        if($tbl == 0 || $per == 0){
            return response()->json(['status' => 0, 'sms' => __('Create Unsuccessfully')]);
        }
        if(!checkPermission($per,'create')){
            return response()->json(['status' => 0, 'sms' => __('No Permission')]);
        }
        $data = $r->except('_token','tbl','per','logo','photo');
        if (Schema::hasColumn($tbl, 'created_by')) {
            $data['created_by'] = session()->get('user')->id;
        }
        if($r->hasFile('photo')){
            if(is_array($r->photo)){
                $photos = $r->photo;
                foreach($photos as $key => $p){
                    $pho = storeFile($p,"$tbl");
                    if($key == 0){
                        $data['photo'] .= $pho;
                    } else {
                        $data['photo'] .= '-||-' . $pho;
                    }
                }
            } else {
                $data['photo'] = storeFile($r->file('photo'),"$tbl");
            }
        }
        if($r->hasFile('logo')){
            $data['logo'] = storeFile($r->file('logo'),"$tbl");
        }
        DB::beginTransaction();
        try {
            $i = DB::table($tbl)->insertGetId($data);
            DB::commit();
            // all good
            return redirect()->back()->with('success',__('Create Successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            // return response()->json(['status' => 1, 'sms' => $e->getMessage() ]);
            return redirect()->back()->with('error',__('Create Unsuccessfully'));
        }
    }
    public function update(Request $r){
        $tbl = base64Decode($r->tbl);
        $per = base64Decode($r->per);
        $id = base64Decode($r->eid);
        if($tbl == 0 || $per == 0 || $id == 0){
            return response()->json(['status' => 0, 'sms' => __('Update Unsuccessfully')]);
        }
        if(!checkPermission($per,'edit')){
            return response()->json(['status' => 0, 'sms' => __('No Permission')]);
        }
        $data = $r->except('_token','tbl','per','logo','photo','eid');
        if (Schema::hasColumn($tbl, 'updated_by')) {
            $data['updated_by'] = session()->get('user')->id;
        }
        if($r->hasFile('photo')){
            //add new file
            if(is_array($r->photo)){
                $photos = $r->photo;
                foreach($photos as $key => $p){
                    $pho = storeFile($p,"$tbl");
                    if($key == 0){
                        $data['photo'] .= $pho;
                    } else {
                        $data['photo'] .= '-||-' . $pho;
                    }
                }
            } else {
                $data['photo'] = storeFile($r->file('photo'),"$tbl");
            }
        }
        if($r->hasFile('logo')){
            $data['logo'] = storeFile($r->file('logo'),"$tbl");
        }
        DB::beginTransaction();
        try {
            $find = DB::table($tbl)->find($id);
            //update
            DB::table($tbl)->where('id',$id)->update($data);
            DB::commit();
            if($r->hasFile('photo')){
                if(Schema::hasColumn($tbl, 'photo')){
                    $toRemvoeFile = $find->photo;
                    $deletePhoto = explode("-||-", $toRemvoeFile);
                    if(count($deletePhoto) > 1){
                        foreach($deletePhoto as $d){
                            unlinkFile($d);
                        }
                    } else {
                        if($toRemvoeFile){
                            unlinkFile($toRemvoeFile);
                        }
                    }
                }
                if(Schema::hasColumn($tbl, 'logo')){
                    unlinkFile($toRemvoeFile);
                }
            }
            // all good
            return redirect()->back()->with('success', __('Update Successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            // return response()->json(['status' => 1, 'sms' => $e->getMessage() ]);
            return redirect()->back()->with('error', __('Update Unsuccessfully'));
        }
    }
    public function delete($tbl,$id,$per){
        $tbl = base64Decode($tbl);
        $id = base64Decode($id);
        $per = base64Decode($per);

        if($tbl == 0 || $id == 0 || $per == 0){
            return response()->json(['status' => 0, 'sms' => __('Delete Unsuccessfully')]);
        }
        if(!checkPermission($per,'delete')){
            return response()->json(['status' => 0, 'sms' => __('No Permission')]);
        }
        DB::beginTransaction();
        try {
            DB::table($tbl)->where('id',$id)->update(['active' => 0]);
            DB::commit();
            // all good
            return response()->json(['status' => 1, 'sms' => __('Delete Successfully')]);
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            // return response()->json(['status' => 1, 'sms' => $e->getMessage() ]);
            return response()->json(['status' => 0, 'sms' => __('Delete Unsuccessfully')]);
        }
    }
    public function deleteAll(Request $r){

    }
}
