<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PengeluaranOpsTokoListrik;
use Carbon\Carbon;

class PengeluaranOpsTokoListrikSeeder extends Seeder
{
    public function run()
    {
        $startDate = \Carbon\Carbon::create(2023, 1, 1);
        $endDate = today();

        $dates = [];

        while ($startDate->lessThanOrEqualTo($endDate)) {
            $dates[] = $startDate->toDateString();
            $startDate->addDay();
        }

        foreach ($dates as $date) {
            PengeluaranOpsTokoListrik::factory()->create(['created_at' => $date, 'updated_at' => $date]);
        }
    }
}
