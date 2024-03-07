<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stall;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Charts\AdminChart;
use App\Models\Tenant;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
            {
                $usertype = Auth()->user()->usertype;
                if($usertype=='user')
                {
                    return view('user.dashboard');
                }
                else if($usertype=='admin')
                {
                    return view('admin.dashboard');
                }
                else
                {
                    return redirect()->route('login');
                }
            }
    }
}
