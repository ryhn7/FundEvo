<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PenjualanBBM;
use App\Models\PengeluaranOpsBBM;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // PengeluaranOpsBBM::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('b_b_m_s')->insert([
            [
                'jenis_bbm' => 'Pertalite',
                'harga_beli' => 9700,
                'harga_jual' => 10000,
            ],
            [
                'jenis_bbm' => 'Pertamax',
                'harga_beli' => 13200,
                'harga_jual' => 13500,
            ],
            [
                'jenis_bbm' => 'Bio Solar',
                'harga_beli' => 6700,
                'harga_jual' => 7000,
            ],
            [
                'jenis_bbm' => 'Dex',
                'harga_beli' => 8700,
                'harga_jual' => 9000,
            ],
        ]);

        PenjualanBBM::factory(30)->create();

    }
}
