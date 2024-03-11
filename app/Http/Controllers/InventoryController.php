<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Stall;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Stall::with('inventory')->get();
        return view('inventory.index', compact('inventories'));
    }
}
