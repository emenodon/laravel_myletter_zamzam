<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $countin = DB::table('suratins')->count();
        $countout = DB::table('suratouts')->count();

        return view('dashboard.index', [
            'datain' => $countin, 
            'dataout' => $countout
        ]);
    }
}
