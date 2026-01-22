<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('users')->get();
        return response()->json($roles);
    }

    public function store(StoreRoleRequest $request)
    {
        $role = new Role();
        $role->fill($request->all());
        $role->save();
        return response()->json($role, 200);
    }

    public function show(string $id)
    {
        return Role::findOrFail($id);
    }

    public function update(UpdateRoleRequest $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->fill($request->all());
        $role->save();
        return response()->json($role, 200);
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(null, 200);
    }
}
