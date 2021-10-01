<?php

namespace App\Http\Controllers\Categoria;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();

        return response()->json(['categorias' => $categorias], 200);
    }

    public function store(Request $request)
    {
        $reglas = [
            'nombre' => 'required',
            'descripcion' => 'required',
        ];

        $this->validate($request, $reglas);

        $categoria = Categoria::create($request->all());

        return response()->json(['categoria' => $categoria], 200);
    }

    public function show(Categoria $categoria)
    {

        return response()->json(['categoria' => $categoria], 200);
    }

    public function update(Request $request, Categoria $categoria)
    {

        $categoria->fill($request->only([
            'nombre',
            'descripcion',
        ]));

        if ($categoria->isClean()) {
            return response()->json(['error' => 'Debes poner por lo menos un campo diferente para actualizar'], 400);
        }

        $categoria->save();

        return response()->json(['categoria actualizada' => $categoria], 200);
    }

    public function destroy(Categoria $categoria)
    {
        //
    }
}
