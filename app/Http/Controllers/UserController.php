<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Codtip_doc' => 'required',
            'Ndocum' => 'required|unique:users',
            'Fecha_exp' => 'required|date',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'Fecha_nac' => 'required|date',
            'Sexo' => 'required',
            'Celular' => 'required',
            'Ciudad' => 'required',
            'Codtip_usu' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function show($id)
    {
        $users = User::find($id);
        return view('users.show', compact('users'));
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Ndocum' => 'required|unique:users,Ndocum,' . $id,
            'Codtip_doc' => 'required',
            'Fecha_exp' => 'required|date',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'Fecha_nac' => 'required|date',
            'Sexo' => 'required',
            'Celular' => 'required',
            'Ciudad' => 'required',
            'Codtip_usu' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $users = User::find($id);
        $users->update($request->all());

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
