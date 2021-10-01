<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::has('productos')->get();

        return response()->json(['vendedores' => $vendedores], 200);
    }

    public function show($id)
    {
        $vendedor = Vendedor::has('productos')->findOrFail($id);

        return response()->json(['vendedor' => $vendedor], 200);
    }

}
