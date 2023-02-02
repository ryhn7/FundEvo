<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengeluaranOpsBBM>
 */
class PengeluaranOpsBBMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'oli' => fake()->numberBetween(100000, 1000000),
            'gas' => fake()->numberBetween(100000, 1000000),
            'gaji_supervisor' => fake()->numberBetween(3000000, 5000000),
            'gaji_karyawan' => fake()->numberBetween(20000000, 25000000),
            'reward_karyawan' => fake()->numberBetween(1000000, 3000000),
            'pln' => fake()->numberBetween(1000000, 3000000),
            'pdam' => fake()->numberBetween(500000, 1000000),
            'iuran_rt' => fake()->numberBetween(100000, 300000),
            'pbb' => fake()->numberBetween(1000000, 3000000),
            'biaya_lain' => fake()->numberBetween(100000, 300000),
        ];
    }
}
