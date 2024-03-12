<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stall;
use App\Models\Parking;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Charts\AdminChart;
use App\Models\Tenant;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('user.dashboard');
            } else if ($usertype == 'admin') {
                // Add your code for admin dashboard here
                $userCount = User::count();
                $tenantCount = Tenant::count();

                $tenantByAddress = Tenant::whereNotNull('address')
                    ->groupBy('address')
                    ->orderBy('total')
                    ->pluck(DB::raw('count(address) as total'), 'address')
                    ->take(-3) // Retrieve the latest 3 records
                    ->all();

                $tenantByAddressChart = new AdminChart();
                $tenantByAddressChart->labels(array_keys($tenantByAddress))
                    ->dataset('Tenant Demographics by Address', 'bar', array_values($tenantByAddress))
                    ->backgroundColor(['#7158e2', '#3ae374', '#ff3838','#111111']);

                // Retrieve only the latest 4 records
                $parkingChargesByDay = Parking::select(DB::raw('DATE(parking_start) as day'), DB::raw('SUM(charge) as total_charge'))
                    ->groupBy(DB::raw('DATE(parking_start)'))
                    ->orderBy(DB::raw('DATE(parking_start)'), 'desc')
                    ->take(4)
                    ->get();

                $parkingLabels = [];
                $parkingCharges = [];

                foreach ($parkingChargesByDay as $parkingCharge) {
                    $parkingLabels[] = $parkingCharge->day;
                    $parkingCharges[] = $parkingCharge->total_charge;
                }

                $parkingChargesChart = new AdminChart();
                $parkingChargesChart->labels(array_reverse($parkingLabels)) // Reverse the array to display the latest data first
                    ->dataset('Parking Charges by Day', 'line', array_reverse($parkingCharges))
                    ->backgroundColor(['rgba(54, 162, 235, 0.2)'])
                    ->color(['rgb(54, 162, 235)']);

                $countChart = new AdminChart();
                $countChart->labels(['Users', 'Tenants'])
                    ->dataset('User vs Tenant Count', 'doughnut', [$userCount, $tenantCount])
                    ->backgroundColor(['#ff3838', '#fbbd08']);

                $countChart->options([
                    'responsive' => true,
                    'legend' => ['display' => true],
                    'tooltips' => ['enabled' => true],
                    'aspectRatio' => 1,
                    'scales' => [
                        'yAxes' => [
                            [
                                'display' => true,
                            ],
                        ],
                        'xAxes' => [
                            [
                                'gridLines' => ['display' => false],
                                'display' => true,
                            ],
                        ],
                    ],
                ]);

                return view('admin.dashboard', compact('tenantByAddressChart', 'countChart', 'parkingChargesChart'));
            } else {
                return redirect()->route('login');
            }
        }
    }
}
