<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use DB;
use Session;
use File;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $file_path_en = resource_path('lang/en.json');
        $languages = (object) json_decode(File::get($file_path_en));
        if(session()->has('language')){
            if(session()->get('language') == 'kh'){
                $file_path_kh = resource_path('lang/kh.json');
                $languages =  (object) json_decode(File::get($file_path_kh));
            }
        }
       
        return array_merge(parent::share($request), [
            'permission' => getPermissions('view'),
            'auth' => session()->has('user') ? collect(DB::table('users')->find(session()->get('user')->id))->only('name','photo') : false,
            'company' => DB::table('companies')->find(1),
            'success' => Session::has('success') ? Session::get('success') : null,
            'warning' => Session::has('warning') ? Session::get('warning') : null,
            'error' => Session::has('error') ? Session::get('error') : null,
            'language' => Session::has('language') ? Session::get('language') : 'en',
            'languages' => $languages,
            'eData' => (Object)[]
        ]);
    }
}
