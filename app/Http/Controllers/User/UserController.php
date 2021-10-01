<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $usuarios = User::all();

        return response()->json(['usuarios' => $usuarios], 200);
    }

    public function store(Request $request)
    {
        $reglas = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ];

        $this->validate($request, $reglas);
        $campos = $request->all();
        $campos['password'] = bcrypt($request->password);

        $usuario = User::create($campos);

        return response()->json(['usuario' => $usuario], 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json(['usuario' => $user], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $reglas = [
            'email' => 'email|unique:users',
            'password' => 'min:6',
        ];

        $this->validate($request, $reglas);

        if ( $request->has('name')) {
            $user->name = $request->name;
        }

        if($request->has('email') && $user->email != $request->email) {
            $user->email = $request->email;
        }

        if ( $request->has('password') ) {
            $user->password = bcrypt($request->password);
        }

        if ( !$user->isDirty() ) {
            return response()->json(['error' => 'Se debe especificar por lo menos un valor distinto para actualizar', 'codigo' => 400], 400);
        }

        $user->save();

        return response()->json(['ok' => 'Usuario actualizado con exito', 'codigo' => 200], 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['datos' => $user, 'mensaje' => 'Usuario eliminado con exito'], 200);
    }
}
