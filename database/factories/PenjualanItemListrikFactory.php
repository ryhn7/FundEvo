<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenjualanItemListrik>
 */
class PenjualanItemListrikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_id' => fake()->unique()->numberBetween(1, 5),
            'stock_awal' => fake()->numberBetween(1000, 10000),
            'penerimaan' => fake()->numberBetween(1000, 16000),
            'penjualan' => fake()->numberBetween(100, 7000),
            'stock_akhir' => fake()->numberBetween(1000, 8000),
            'pendapatan' => fake()->numberBetween(10000000, 1000000000),
        ];
    }
}
