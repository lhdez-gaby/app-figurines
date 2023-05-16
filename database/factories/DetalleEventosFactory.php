<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\detalle_eventos>
 */
class DetalleEventosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this -> faker ->nombre,
            'imagen' => $this -> faker ->imagen,
            'detalle' =>$this->faker->detalle,
            'precio' =>$this->faker->precio,
            'duracion' =>$this->faker->duracion
        ];
    }
}
