<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengaduan>
 */
class PengaduanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'no_ktp' => $this->faker->numerify('################'),
            'no_hp' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'detail' => $this->faker->sentence,
            'foto_nama' => $this->faker->word . '.jpg',
            'foto_nama_store' => $this->faker->word . '.jpg',
            'nomor_pengaduan' => 'P' . now()->format('Ymd') . '-' . $this->faker->unique()->numberBetween(100000, 999999),
            'status' => 'Pending'
        ];
    }
}
