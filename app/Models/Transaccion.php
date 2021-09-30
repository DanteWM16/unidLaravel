<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comprador;
use App\Models\Producto;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';
    protected $fillable = [
        'cantidad',
        'comprador_id',
        'producto_id',
    ];

    public function comprador() {
        return $this->belongsTo(Comprador::class);
    }

    public function producto() {
        return $this->belongsTo(Producto::class);
    }
}
