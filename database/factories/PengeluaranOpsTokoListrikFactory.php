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
        $startDate = '2023-01-01';
        $endDate = '2023-06-25';
        $date = $this->generateRandomDate($startDate, $endDate);
        return [
            'biaya_kulakan' => fake()->numberBetween(20000000, 25000000),
            'gaji_karyawan' => fake()->numberBetween(20000000, 25000000),
            'reward_karyawan' => fake()->numberBetween(1000000, 3000000),
            'pbb' => fake()->numberBetween(1000000, 3000000),
            'biaya_lain' => fake()->numberBetween(100000, 300000),
            'date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }

    private function generateRandomDate($startDate, $endDate)
    {
        $startTimestamp = strtotime($startDate);
        $endTimestamp = strtotime($endDate);
        $randomTimestamp = mt_rand($startTimestamp, $endTimestamp);

        return date('Y-m-d H:i:s', $randomTimestamp);
    }
}
