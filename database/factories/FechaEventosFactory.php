<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\fecha_eventos>
 */
class FechaEventosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1,6),
            'evento_id' => $this->faker->numberBetween(1,25),
            'fecha' => $this->faker->date,
            'hora' => $this->faker->time,
            'estado' => $this->faker->estado,
            'direccion' => $this->faker->direccion,
            'telefono' =>$this->faker->telefono
        ];
    }
}
