<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use View;
use Validator;
use App\Models\Stall;
use App\Models\Tenant;
use Redirect;

class StallController extends Controller
{

    public function index()
    {
        $stalls = Stall::all();
        return View::make('admin.stall', compact('stalls'));
    }

    public function create()
    {
        return View::make('stall.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codename' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'rental_rate' => 'required|numeric',
            'img_path.*' => 'required|image|mimes:jpg,bmp,png|max:2048',
        ]);

        $stall = new Stall();
        $stall->codename = $request->codename;
        $stall->description = $request->description;
        $stall->status = $request->status;
        $stall->rental_rate = $request->rental_rate;

        if ($request->hasFile('img_path')) {
            foreach ($request->file('img_path') as $image) {
                $path = $image->store('public/images');
                $stall->img_path = str_replace('public/', 'storage/', $path);
            }
        }

        $stall->save();

        return redirect()->route('stall.index')->with('success', 'Stall created successfully.');
    }

    public function edit(string $id)
    {
        $stall = Stall::find($id);
        return View::make('stall.edit', compact('stall'));
    }

    public function update(Request $request, $id)
    {
        if ($request->file('img_path')) {
            $path = Storage::putFileAs(
                'public/images',
                $request->file('img_path'),
                $request->file('img_path')->getClientOriginalName()
            );
            $stall = Stall::where('id', $id)->update([
                'codename' => $request->codename,
                'description' => $request->description,
                'status' => $request->status,
                'rental_rate' => $request->rental_rate,
                'img_path' => 'storage/images/' . $request->file('img_path')->getClientOriginalName()
            ]);
        } else {
            $stall = Stall::where('id', $id)->update([
                'codename' => $request->codename,
                'description' => $request->description,
                'status' => $request->status,
                'rental_rate' => $request->rental_rate
            ]);
        }
        return redirect()->route('stall.index')->with('success', 'Stall updated successfully.');
    }

    public function destroy(string $id)
    {
        Stall::destroy($id);
        return Redirect::to('stall')->with('success', 'Stall deleted successfully.');
    }

    public function showInventory()
    {
        $inventories = Stall::with('tenant')->get();
        return view('admin.inventory', compact('inventories'));
    }
}
