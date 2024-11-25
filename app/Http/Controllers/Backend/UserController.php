<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('app.users.index');
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('app.users.create');
        
        $roles = Role::all();
        return view('backend.user.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
        

        
    // }

    public function store(Request $request)
    {
        Gate::authorize('app.users.create');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
            
        ]);
        notify()->success("User Added","Success");
        return redirect()->route('app.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('app.users.edit');

        $roles = Role::all();
        return view('backend.user.form', compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('app.users.edit');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required',
            'password' => 'nullable'
        ]);

        $user->update([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' =>isset($request->password)? Hash::make($request->password) : $user->password
        ]);
        notify()->success("User Updated","Success");
        return redirect()->route('app.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('app.users.destroy');

        $user->delete();
        notify()->success("Role Deleted","Success");
        return back();
    }
}
