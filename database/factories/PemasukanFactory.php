<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemasukan>
 */
class PemasukanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_jenis_pemasukan' => fake()->randomElement(['1']),
            'jumlah_pemasukan' => fake()->randomNumber(5, true),
            'tanggal_pemasukan' => fake()->dateTimeBetween('-1 years', 'now'),
            'deskripsi' => fake()->text(10),
            //
        ];
    }
}
