<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Producto;

class ProductoMigrate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table ) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion', 1000);
            $table->integer('cantidad')->unsigned();
            $table->string('status')->default(Producto::PRODUCTO_NO_DISPONIBLE);
            $table->string('img');
            $table->integer('vendedor_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
