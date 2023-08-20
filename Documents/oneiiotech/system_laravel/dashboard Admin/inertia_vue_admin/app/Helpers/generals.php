<?php

function assetImg(){
    return asset('');
}

function getFile($path){
    // generale
    return asset($path);
    //space || digitalocean
    // return Storage::disk('public')->url($image); 
}

function checkHasFile($path){
    //generale
    return file_exists($path);
    //space || digitalocean
    // return Storage::disk('public')->exists($image); 
}

function storeFile($file, $path){
    //generale
    $path = 'photos/'.$path;
    return $file->store($path, 'custom');
    //space
}

function unlinkFile($path){
    if(Storage::disk('custom')->delete($path)){
        return 1;
    } else {
        return 0;
    }
    // $disk = Storage::disk('spaces');
    // if($disk->delete('cbc_wesite/'.$path)){
    //     return 'cbc_wesite/'.$path;
    // }else{
    //     return 0;
    // }
}

function company(){
    $data = DB::table('companies')->find(1);
    return $data;
}

function audit($tbl,$action_id,$old,$new){
    $table_name = DB::table('table_names')->where('key',trim($tbl))->first();
    try{
        DB::table('audits')->insert([
            'table_name_id' => $table_name->id,
            'action_id' => $action_id,
            'old_data' => json_encode($old),
            'new_data' => json_encode($new),
            'action_by' => session()->get('user')->id,
            'ip' => request()->ip()
        ]);
    } catch (\Exception $e) {
        return 0;
    }
    return 1;
}

function page404(){
    return redirect()->route('admin.404')->with('error', __('You have no permission to access this path.'));
}
function requestInertia($r){
    if($r->header('X-Inertia')){
        return true;
    }
    return false;
}

