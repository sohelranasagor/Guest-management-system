<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Events\Validated;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('app.roles.index');

        $roles = Role::all();
        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('app.roles.create');

        $modules = Module::all();
        return view('backend.role.form', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('app.roles.create');

        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'required|array',
            'permissions.*' => 'integer'
        ]);

        Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'deletable' => true
            
        ])->permissions()->sync($request->input('permissions', []));
        notify()->success("Role Added","Success");
        return redirect()->route('app.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        Gate::authorize('app.roles.edit');

        $modules = Module::all();
        return view('backend.role.form', compact('modules', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('app.roles.edit');

        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array',
            'permissions.*' => 'integer'
        ]);

        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        $role->permissions()->sync($request->input('permissions'));
        notify()->success("Role Updated","Success");
        return redirect()->route('app.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        Gate::authorize('app.roles.destroy');
        
        if($role->deletable){
            $role->delete();
            notify()->success("Role Deleted","Success");

        }else{
            notify()->error("You Can't Delete System Role","Error");
        }
        return back();
    }
}
