<?php

namespace App\Models;

class Vendedor extends User
{
    public function productos() {
        return $this->hasMany(Producto::class);
    }
}
