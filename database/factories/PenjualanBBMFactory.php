<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenjualanBBM>
 */
class PenjualanBBMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bbm_id' => fake()->unique()->numberBetween(1, 4),
            'stock_awal' => fake()->numberBetween(1000, 10000),
            'penerimaan' => fake()->numberBetween(1000, 16000),
            'penjualan' => fake()->numberBetween(100, 7000),
            'stock_adm' => fake()->numberBetween(1000, 8000),
            'stock_fakta' => fake()->numberBetween(1000, 8000),
            'penyusutan' => fake()->numberBetween(0, 100),
            'pendapatan' => fake()->numberBetween(10000000, 1000000000),
        ];
    }
}
