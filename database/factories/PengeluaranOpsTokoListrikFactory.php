<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PengeluaranOpsTokoListrik;
use Carbon\Carbon;

class PengeluaranOpsTokoListrikFactory extends Factory
{
    protected $model = PengeluaranOpsTokoListrik::class;

    public function definition()
    {
        $date = $this->faker->dateTimeBetween('2023-01-01', now());

        return [
            'biaya_kulakan' => $this->faker->numberBetween(30000000, 35000000),
            'gaji_karyawan' => $this->faker->numberBetween(20000000, 25000000),
            'reward_karyawan' => $this->faker->numberBetween(1000000, 3000000),
            'pbb' => $this->faker->numberBetween(1000000, 3000000),
            'biaya_lain' => $this->faker->numberBetween(100000, 300000),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
