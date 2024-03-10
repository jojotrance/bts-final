<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stall;
use App\Models\User;
use App\Models\Tenant;
use View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $stalls = Stall::all();
        return View::make('user.index', compact('stalls'));
    }

    public function indexFilter(Request $request)
    {
        $stalls = Stall::query();

        if ($request->has('status')) {
            if ($request->status === 'Maintenance') {
                $stalls->where('status', 'Maintenance');
            } else {
                $stalls->where('status', $request->status);
         }
    }

        $filteredStalls = $stalls->get();

        return view('user.index', ['stalls' => $filteredStalls]);
    }
}
