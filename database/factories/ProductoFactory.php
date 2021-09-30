<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->paragraph(1),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement([Producto::PRODUCTO_DISPONIBLE, Producto::PRODUCTO_NO_DISPONIBLE]),
            'img' => $this->faker->randomElement(['1.jpg','2.jpg', '3.jpg']),
            'vendedor_id' => User::all()->random()->id,
        ];
    }
}
