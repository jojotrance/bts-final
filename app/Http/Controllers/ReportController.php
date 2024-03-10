<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use View;

class ReportController extends Controller
{
    public function generateAnalytics()
    {
        $html = View::make('admin.analytics');
        $pdf = PDF::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->download('document.pdf');
    }
}
