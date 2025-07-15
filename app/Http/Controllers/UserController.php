<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'pharmacist')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'pharmacist';
        $user->save();
        return redirect()->route('users.index')->with('success', 'Pharmacist added successfully!');
    }

    public function show(Request $request)
    {
        $user = User::find($request->id);
        return view('users.show', compact('user'));
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('users.edit', compact('user'));
    }

    // Update pharmacist
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('users.index')->with('success', 'Pharmacist updated successfully!');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Pharmacist deleted successfully!');
    }
}
