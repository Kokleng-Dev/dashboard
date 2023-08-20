<?php

namespace App\Http\Controllers\backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;
use File;

class HomeController extends Controller
{
    public function index(){
        return Inertia::render('backends/homes/index',[
            'yes' => DB::table('companies')->find(1)->name,
        ]);
    }
}
