<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Stall;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use View;
use Storage;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::with('stall')->get();
        return view('admin.tenant', compact('tenants'));
    }

    public function create(Request $request)
    {
        $stallId = $request->query('id');
        return view('tenant.create', compact('stallId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required|integer',
            'contact_no' => 'required|string',
            'address' => 'required|string',
            'leaseagreement' => 'required|file|mimes:pdf|max:2048',
            'img_path' => 'required|file|image|max:2048',
        ]);

        $userId = Auth::id();
        $stallId = $request->stallId;

        $tenant = new Tenant();
        $tenant->user_id = $userId;
        $tenant->stall_id = $stallId;
        $tenant->age = $request->age;
        $tenant->contact_no = $request->contact_no;
        $tenant->address = $request->address;

        $leaseAgreementPath = $request->file('leaseagreement')->store('public/leaseagreement');
        $tenant->leaseagreement = str_replace('public/', 'storage/', $leaseAgreementPath);

        $imagePath = $request->file('img_path')->store('public/images');
        $tenant->img_path = str_replace('public/', 'storage/', $imagePath);

        $tenant->status = 'pending';

        $tenant->save();

        if ($tenant->status === 'accepted') {
            $rentalRate = Stall::find($stallId)->rental_rate;
            $payment = new Payment([
                'tenant_id' => $tenant->id,
                'amount_to_be_paid' => $rentalRate,
                'amount_paid' => 0,
                'balance' => $rentalRate,
            ]);
            $payment->save();
        }

        return redirect()->back()->with('success', 'Tenant application submitted successfully!');
    }

    public function edit($id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('tenant.edit', compact('tenant'));
    }


    //kailangan kapag na-accept na sya yung status ng stall is magiging occupied
    // public function update(Request $request, $id)
    // {
    //     $tenant = Tenant::findOrFail($id);

    //     if ($request->status === 'accepted' && $tenant->status !== 'accepted') {
    //         $rentalRate = Stall::find($tenant->stall_id)->rental_rate;
    //         $payment = Payment::updateOrCreate(
    //             ['tenant_id' => $tenant->id],
    //             [
    //                 'amount_to_be_paid' => $rentalRate,
    //                 'amount_paid' => 0,
    //                 'balance' => $rentalRate,
    //             ]
    //         );
    //     } elseif ($request->status !== 'accepted' && $tenant->status === 'accepted') {
    //         $tenant->payment()->delete();
    //     }

    //     $tenant->status = $request->status;
    //     $tenant->save();

    //     return redirect()->route('tenant.index')->with('success', 'Tenant updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);

        if ($request->status === 'accepted' && $tenant->status !== 'accepted') {
            $rentalRate = Stall::find($tenant->stall_id)->rental_rate;
            $payment = Payment::updateOrCreate(
                ['tenant_id' => $tenant->id],
                [
                    'amount_to_be_paid' => $rentalRate,
                    'amount_paid' => 0,
                    'balance' => $rentalRate,
                ]
            );

            // Update stall status to 'occupied' when tenant status is accepted
            $stall = Stall::find($tenant->stall_id);
            $stall->status = 'Occupied';
            $stall->save();
        } elseif ($request->status !== 'accepted' && $tenant->status === 'accepted') {
            $tenant->payment()->delete();

            // Update stall status to 'available' when tenant status is not accepted
            $stall = Stall::find($tenant->stall_id);
            $stall->status = 'For Rent';
            $stall->save();
        }

        $tenant->status = $request->status;
        $tenant->save();

        return redirect()->route('tenant.index')->with('success', 'Tenant updated successfully.');
    }


    public function mystall()
    {
        $user = Auth::user();

        $tenant = Tenant::where('user_id', $user->id)->where('status', 'accepted')->first();

        if ($tenant) {
            $stall = $tenant->stall;
            $payment = $tenant->payment;
            return view('tenant.stall', compact('stall', 'payment'));
        } else {
            return view('tenant.pending');
        }
    }
}
