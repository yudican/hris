<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Roles',
            'roles' => Role::all(),
            'no' => 1
        ];

        return view('admin.roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Buat Roles'
        ];

        return view('admin.roles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Role::firstOrCreate(['name' => $request->name]);

        return redirect()->route('roles.index')->withSuccess('Role Baru Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Buat Roles',
            'id' => $id,
            'role' => Role::findOrFail($id)
        ];

        return view('admin.roles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Role::findOrFail($id)->update(['name' => $request->name]);

        return redirect()->route('roles.index')->withSuccess('Role Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        // remove role from user
        $role->delete();

        return redirect()->route('roles.index')->withSuccess('Role Berhasil Dihapus');
    }


    public function permissions($id)
    {
        $menusWithPermissions = Menu::with('permissions')->get();
        $role = Role::findOrFail($id);
        $data = [
            'title' => 'Update Roles Permissions Users',
            'id' => $id,
            'menupermissions' => $menusWithPermissions,
            'role' => $role,
            'no' => 1
        ];

        return view('admin.roles.permission', $data);
    }

    public function setRolePermissions(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        // add role permissions
        $role->syncPermissions($request->permission);

        return redirect()->route('roles.index')->withSuccess('Role Permissions Berhasil Diubah');
    }
}
