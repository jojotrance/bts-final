<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tenant;
use App\Models\TenantFinancial;
use PDF;
use View;

class FinancialController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     $tenant = $user->tenant;

    //     if ($tenant) {
    //         $financials = TenantFinancial::whereHas('tenant', function ($query) {
    //             $query->where('status', 'accepted');
    //         })->get();

    //         return view('financial.index', compact('financials'));
    //     } else {
    //         return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
    //     }
    // }

    public function index()
    {
        $user = Auth::user();
        $tenant = $user->tenant;

        if ($tenant) {
            $financials = TenantFinancial::whereHas('tenant', function ($query) {
                $query->where('status', 'accepted');
            })->get();

            // Calculate total income and expenses
            $totalIncome = $financials->where('type', 'income')->sum('amount');
            $totalExpenses = $financials->where('type', 'expense')->sum('amount');
            $difference = $totalIncome - $totalExpenses;

            // Prepare data for the chart
            $chartData = [
                'labels' => ['Income', 'Expenses'],
                'data' => [$totalIncome, $totalExpenses],
                'difference' => abs($difference),
                'backgroundColor' => ['#3cba9f', '#c45850'],
            ];

           $html = View::make('financial.index', compact('financials', 'chartData'));
           $pdf = PDF::loadHTML($html)->setPaper('a4', 'landscape');
           return $pdf->download('document.pdf');
        } else {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
    }

    public function create()
    {
        return view('financial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $user = Auth::user();
        $tenant = $user->tenant;

        // Create the financial record
        $financials = new TenantFinancial();
        $financials->tenant_id = $tenant->id;
        $financials->amount = $request->amount;
        $financials->type = $request->type;
        $financials->description = $request->description;
        $financials->date = $request->date;
        $financials->save();

        return redirect()->back()->with('success', 'Data recorded successfully');
    }
}
