<?php

namespace App\Models;

class Comprador extends User
{
    public function transacciones() {
        return $this->hasMany(Transaccion::class);
    }
}
