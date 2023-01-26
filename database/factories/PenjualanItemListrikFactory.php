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
            'item_id' => mt_rand(1, 5),
            'stock_awal' => fake()->numberBetween(0, 1000),
            'penerimaan' => fake()->numberBetween(500, 1000),
            'penjualan' => fake()->numberBetween(1, 500),
            'stock_akhir' => fake()->numberBetween(1, 500),
            'stock_kurang' => fake()->numberBetween(0, 100),
            'pendapatan' => fake()->numberBetween(10000000, 1000000000),
        ];
    }
}
