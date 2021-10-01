<?php

namespace App\Http\Controllers\Comprador;

use App\Http\Controllers\Controller;
use App\Models\Comprador;
use Illuminate\Http\Request;

class CompradorController extends Controller
{
    public function index()
    {
        $compradores = Comprador::has('transacciones')->get();

        return response()->json(['compradores' => $compradores], 200);
    }

    public function show($id)
    {
        $comprador = Comprador::has('transacciones')->findOrFail($id);

        return response()->json(['comprador' => $comprador], 200);
    }

}
