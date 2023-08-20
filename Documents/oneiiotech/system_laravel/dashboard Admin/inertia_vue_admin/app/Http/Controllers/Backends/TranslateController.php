<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use DataTables;

class TranslateController extends Controller
{
    public function translateKh(Request $r){
        if(!checkPermission('translate_khmer','view')){
            return redirect()->route('admin.404');
        }
        if($r->ajax()){
            $file_path = resource_path('lang/kh.json');
            $data = json_decode(File::get($file_path));

            $dataTable = collect([]);
            foreach($data as $k => $d){
                $dataTable->push([
                    'key' => $k,
                    'word' => $d
                ]);
            }

            return DataTables::of($dataTable)->make(true);
        }

        $file_path_en = resource_path('lang/en.json');
        $dataEn = (array) json_decode(File::get($file_path_en));
        
        $file_path_kh = resource_path('lang/kh.json');
        $dataKh =  (array) json_decode(File::get($file_path_kh));

        $newDataKh = [];
        foreach($dataEn as $en_key => $en){
            if(array_key_exists($en_key, $dataKh)){
                $newDataKh[$en_key] = $dataKh[$en_key];
            } else {
                $newDataKh[$en_key] = '';
            }
        }

        $newDataKh = json_encode($newDataKh, JSON_UNESCAPED_UNICODE);
        file_put_contents($file_path_kh,$newDataKh);
        
        return view('backends.translates.kh');
    }
    public function changeTranslateKh(Request $r){
        if($r->ajax()){
            if(!checkPermission('translate_khmer','edit')){
                return response()->json(['status' => 0, 'sms' => __('No Permission')]);
            }
            $file_path = resource_path('lang/kh.json');
            $data = (array) json_decode(File::get($file_path));
            $data[$r->key] = $r->word;
            file_put_contents($file_path,json_encode($data, JSON_UNESCAPED_UNICODE));
            return 1;
        }
    }
    public function translateEn(Request $r){
        if(!checkPermission('translate_english','view')){
            return redirect()->route('admin.404');
        }
        if($r->ajax()){
            // read
            if($r->condition == 1){
                $file_path = resource_path('lang/en.json');
                $data = json_decode(File::get($file_path));

                $dataTable = collect([]);
                foreach($data as $k => $d){
                    $dataTable->push([
                        'key' => $k,
                        'word' => $d
                    ]);
                }

                return DataTables::of($dataTable)->make(true);
            } 
            //update
            else if($r->condition == 2) {
                if(!checkPermission('translate_english','edit')){
                    return response()->json(['status' => 0, 'sms' => __('No Permission')]);
                }
                $file_path = resource_path('lang/en.json');
                $data = (array) json_decode(File::get($file_path));
                $data[$r->key] = $r->word;
                file_put_contents($file_path,json_encode($data, JSON_UNESCAPED_UNICODE));
                return 1;
            }
            //write || create
            else {
                $file_path = resource_path('lang/en.json');
                $data = (array) json_decode(File::get($file_path));
                $data[$r->key] = $r->word;
                file_put_contents($file_path,json_encode($data, JSON_UNESCAPED_UNICODE));
                return response()->json(['status' => 1, 'sms' => __('Create Successfully')]);
            }
        }
        return view('backends.translates.en');
    }
}
