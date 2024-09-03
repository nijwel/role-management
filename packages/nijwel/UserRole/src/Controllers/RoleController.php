<?php

namespace Nijwel\UserRole\Controllers;

use Nijwel\UserRole\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles']);
        Role::create($request->all());
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        $role = Role::findOrFail($id);
        $role->update($validatedData);
        return;
    }

    public function destroy($id)
    {
        Role::find($id)->delete();
        return;
    }
}
