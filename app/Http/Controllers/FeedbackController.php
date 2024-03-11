<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use View;


class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('tenant.stall')->get();
        return View::make('feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        $user = auth()->user();
        $tenantId = $user->tenant->id;

        return view('feedback.create', compact('tenantId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'reason' => 'required|string',
            'suggestion' => 'required|string',
            'img_path' => 'required|image|mimes:jpg,bmp,png|max:2048',
        ]);

        $feedback = new Feedback();
        $feedback->tenant_id = $request->tenant_id;
        $feedback->reason = $request->reason;
        $feedback->suggestion = $request->suggestion;

        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('public/images');
            $feedback->img_path = str_replace('public/', 'storage/', $path);
        }
        $feedback->save();
        return redirect()->route('tenant.stall')->with('success', 'Concern submitted.');
    }
}
