<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendedor;
use App\Models\Transaccion;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;

    const PRODUCTO_DISPONIBLE = 'disponible';
    const PRODUCTO_NO_DISPONIBLE = 'no disponible';

    protected $fillable = [
        'nombre',
        'descripcion',
        'cantidad',
        'status',
        'img',
        'vendedor_id',
    ];

    public function enStock() {
        return $this->status == Producto::PRODUCTO_DISPONIBLE;
    }

    public function vendedor() {
        return $this->belongsTo(Vendedor::class);
    }

    public function transacciones() {
        return $this->hasMany(Transaccion::class);
    }

    public function categorias() {
        return $this->belongsToMany(Categoria::class);
    }
}
