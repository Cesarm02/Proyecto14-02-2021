<?php

namespace App\Http\Controllers;

use App\User;
use App\Modelos\Role;
use Illuminate\Http\Request;
use App\Modelos\ControlCambios;
use App\Modelos\InformacionUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(Auth()->user()->roles[0]->id);
        $this->authorize('haveaccess', "user.index");

        $users = User::with('roles')->orderBy('id', 'Desc')->get();
        // return $users;
        return view('user.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $this->authorize('view', [$user, ['user.show', 'userown.show'] ]);

        $roles = Role::orderBy('nombre')->get();
        $informacion = InformacionUser::findOrFail($user->id);
        // dd($informacion);

        // return $roles;
        return view('user.view', compact('roles', 'user', 'informacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', [$user, ['user.edit', 'userown.edit']]);

        // $this->authorize('update', $user);

        $roles = Role::orderBy('nombre')->get();

        // return $roles;

        return view('user.edit', compact('roles', 'user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'    => 'required|max:50|unique:users,name,' . $user->id,
            'email'      => 'required|max:50|unique:users,email,' . $user->id,
        ]);
        
        // dd($request->all());

        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se edita registro ' . $request->id . ' en la tabla users',
            'id_usuario' => Auth()->user()->id
        ]);
        
        return redirect()->route('user.index')
        ->with('status_success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('haveaccess', "user.destroy");

        $user->delete();
        
        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimia registro ' . $user['id'] . ' en la tabla users',
            'id_usuario' => Auth()->user()->id
        ]);
        
        return redirect()->route('user.index')
        ->with('status_success', 'Usuario eliminado correctamente');
    }

}
