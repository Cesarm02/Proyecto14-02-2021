<?php

namespace App\Http\Controllers;

use App\Modelos\Role;
use App\Modelos\Permiso;
use Illuminate\Http\Request;
use App\Modelos\ControlCambios;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess', "role.index");

        $roles = Role::orderBy('id','Desc')->paginate(2);
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess', "role.create");

        $permisos = Permiso::get();

        return view('role.create',compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('haveaccess', "role.create");

        $request->validate([
            'nombre'    => 'required|max:50|unique:roles,nombre',
            'slug'      => 'required|max:50|unique:roles,slug',
            'acceso'    => 'required|in:si,no',
        ]);
        
        $role = Role::create($request->all());
        //if($request->get('permiso'))
        //{
            $role->permisos()->sync($request->get('permiso'));
        // return $request->all();
        //}

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro en la tabla roles',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('role.index')
            ->with('status_success', 'Rol guardado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('haveaccess', "role.show");

        $permiso_rol = [];

        foreach ($role->permisos as $permiso) {
            $permiso_rol[] = $permiso->id;
        }

        // return $permiso_rol;
        $role->permisos;

        $permisos = Permiso::get();

        return view('role.view', compact('permisos', 'role', 'permiso_rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('haveaccess', "role.edit");

        $permiso_rol = [];

        foreach($role->permisos as $permiso){
            $permiso_rol[] = $permiso->id;
        }

        // return $permiso_rol;

        $role->permisos;

        $permisos = Permiso::get();
        // $permisos = Permiso::get();
        return view('role.edit', compact('permisos','role', 'permiso_rol'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role)
    {
        $this->authorize('haveaccess', "role.edit");

        $request->validate([
            'nombre'    => 'required|max:50|unique:roles,nombre,' . $role->id,
            'slug'      => 'required|max:50|unique:roles,slug,' . $role->id,
            'acceso'    => 'required|in:si,no',
        ]);

        $role->update($request->all());
        //if ($request->get('permiso')) {
            $role->permisos()->sync($request->get('permiso'));
        // return $request->all();
        //}

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se edita registro ' . $request->id . ' en la tabla roles',
            'id_usuario' => Auth()->user()->id
        ]);
        
        return redirect()->route('role.index')
        ->with('status_success', 'Rol actualizado correctamente');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('haveaccess', "role.destroy");

       $role->delete();

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimia registro ' . $role['id'] . ' en la tabla roles',
            'id_usuario' => Auth()->user()->id
        ]);
        
        return redirect()->route('role.index')
        ->with('status_success', 'Rol eliminado correctamente');
    }
}
