<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengeluaranOpsTokoListrik>
 */
class PengeluaranOpsTokoListrikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'gaji_karyawan' => fake()->numberBetween(20000000, 25000000),
            'reward_karyawan' => fake()->numberBetween(1000000, 3000000),
            'pbb' => fake()->numberBetween(1000000, 3000000),
            'biaya_lain' => fake()->numberBetween(100000, 300000),
        ];
    }
}
