<?php

namespace Database\Factories;

use App\Models\Transaccion;
use App\Models\User;
use App\Models\Vendedor;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaccion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $vendedor = Vendedor::has('productos')->get()->random();
        $comprador = User::all()->except($vendedor->id)->random();

        return [
            'cantidad' => $this->faker->numberBetween(1,3),
            'comprador_id' => $comprador->id,
            'producto_id' => $vendedor->productos->random()->id,
        ];
    }
}
