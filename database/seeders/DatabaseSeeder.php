<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PenjualanBBM;
use App\Models\PengeluaranOpsBBM;
use App\Models\PenjualanItemListrik;
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

        DB::table('roles')->insert([
            [
                'name' => 'Owner',
            ],
            [
                'name' => 'Admin SPBU',
            ],
            [
                'name' => 'Admin Toko Listrik',
            ],
        ]);

        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => 'Ashlan',
                'email' => 'ashlan@gmail.com',
                'password' => bcrypt('Narnia'),
            ],
            [
                'role_id' => 1,
                'name' => 'Owner',
                'email' => 'owner@gmail.com',
                'password' => bcrypt('Owner'),
            ],
            [
                'role_id' => 2,
                'name' => 'Admin SPBU',
                'email' => 'spbu@gmail.com',
                'password' => bcrypt('SPBU'),
            ],
            [
                'role_id' => 3,
                'name' => 'Admin Toko Listrik',
                'email' => 'listrik@gmail.com',
                'password' => bcrypt('TokoListrik'),
            ],
        ]);

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

        DB::table('oli_gas_statics')->insert([
            [
                'jenis' => 'Oli',
            ],
            [
                'jenis' => 'Gas',
            ],
        ]);

        DB::table('kategori_items')->insert([
            ['kategori' => 'Lampu'],
            ['kategori' => 'Kabel'],
            ['kategori' => 'Stop Kontak'],
            ['kategori' => 'Saklar'],
            ['kategori' => 'Baterai'],
            ['kategori' => 'Senter']
        ]);

        DB::table('items')->insert([
            [
                'id' => 1,
                'kategori' => 5,
                'nama_item' => 'Baterai Alkaline AA- 6 Pcs',
                'harga_beli' => 21000.00,
                'harga_jual' => 26500.00,
            ],
            [
                'id' => 2,
                'kategori' => 5,
                'nama_item' => 'Batre Energizer AAA isi 6',
                'harga_beli' => 26250.00,
                'harga_jual' => 28450.00,
            ],
            [
                'id' => 3,
                'kategori' => 2,
                'nama_item' => 'Kabel LAN 20 Meter NYK CAT 6 / UTP 20M',
                'harga_beli' => 38500.00,
                'harga_jual' => 41900.00,
            ],
            [
                'id' => 4,
                'kategori' => 2,
                'nama_item' => 'Kabel Listrik Serabut NYYHYO Evolus Serabut - Putih',
                'harga_beli' => 90200.00,
                'harga_jual' => 99500.00,
            ],
            [
                'id' => 5,
                'kategori' => 1,
                'nama_item' => 'BARDI Smart LED BLUETOOTH BT 9W RGBWW Beacon Bulb Lampu Tidur Kerja',
                'harga_beli' => 99000.00,
                'harga_jual' => 130000.00,
            ],
            [
                'id' => 6,
                'kategori' => 1,
                'nama_item' => 'Philips MultiPack MyCare LedBulb 12W 6500K Putih',
                'harga_beli' => 150000.00,
                'harga_jual' => 171000.00,
            ],
            [
                'id' => 7,
                'kategori' => 1,
                'nama_item' => 'LED Strip Flexible 12V SMD',
                'harga_beli' => 38000.00,
                'harga_jual' => 45000.00,
            ],
            [
                'id' => 8,
                'kategori' => 4,
                'nama_item' => 'Schneider Electric ZENcelo Saklar Datar 2 Gang 1 Arah',
                'harga_beli' => 126398.00,
                'harga_jual' => 168531.00,
            ],
            [
                'id' => 9,
                'kategori' => 4,
                'nama_item' => 'NERO Saklar CASA X2',
                'harga_beli' => 20000.00,
                'harga_jual' => 28000.00,
            ],
            [
                'id' => 10,
                'kategori' => 6,
                'nama_item' => 'Olight Valkyrie Turbo Senter LEP Weaponlight WML',
                'harga_beli' => 190000.00,
                'harga_jual' => 2313600.00,
            ],
            [
                'id' => 11,
                'kategori' => 6,
                'nama_item' => 'Headlamp Senter Kepala Lima 5 Lampu LED',
                'harga_beli' => 104500.00,
                'harga_jual' => 113850.00,
            ],
            [
                'id' => 12,
                'kategori' => 3,
                'nama_item' => 'Schneider Electric AvatarOn Stop Kontak Schuko',
                'harga_beli' => 82300.00,
                'harga_jual' => 100900.00,
            ],
            [
                'id' => 13,
                'kategori' => 3,
                'nama_item' => 'Allocacoc PowerCube Extended USB GREY Stop Kontak Listrik',
                'harga_beli' => 219000.00,
                'harga_jual' => 249000.00,
            ],
            [
                'id' => 14,
                'kategori' => 3,
                'nama_item' => 'Stop Kontak Kyowa 5 Lubang 5 meter',
                'harga_beli' => 20100.00,
                'harga_jual' => 24900.00,
            ],
            [
                'id' => 15,
                'kategori' => 5,
                'nama_item' => 'Batre ABC photo AA isi 24 Pcs',
                'harga_beli' => 31450.00,
                'harga_jual' => 36000.00,
            ],
            [
                'id' => 16,
                'kategori' => 1,
                'nama_item' => 'UPHOME Lampu Tidur LED Wireless Remote Control 3 color',
                'harga_beli' => 75002.00,
                'harga_jual' => 85000.00,
            ],
            [
                'id' => 17,
                'kategori' => 1,
                'nama_item' => 'Lampu sorot',
                'harga_beli' => 25000.00,
                'harga_jual' => 27000.00,
            ],
        ]);




        PenjualanBBM::factory(30)->create();
        $startDate = '2023-01-01';
        $endDate = '2023-06-07';
        $currentDate = $startDate;

        while ($currentDate <= $endDate) {
            foreach ($this->getItems() as $item) {
                PenjualanItemListrik::factory()->create([
                    'item_id' => $item['id'],
                    'kategori_id' => $item['kategori'],
                    'created_at' => $currentDate,
                    'updated_at' => $currentDate,
                ]);
            }

            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        }
    }

    private function getItems()
    {
        return [
            [
                'id' => 1,
                'kategori' => 5,
                'harga_jual' => 26500.00,
            ],
            [
                'id' => 2,
                'kategori' => 5,
                'harga_jual' => 28450.00,
            ],
            [
                'id' => 3,
                'kategori' => 2,
                'harga_jual' => 41900.00,
            ],
            [
                'id' => 4,
                'kategori' => 2,
                'harga_jual' => 99500.00,
            ],
            [
                'id' => 5,
                'kategori' => 1,
                'harga_jual' => 130000.00,
            ],
            [
                'id' => 6,
                'kategori' => 1,
                'harga_jual' => 171000.00,
            ],
            [
                'id' => 7,
                'kategori' => 1,
                'harga_jual' => 45000.00,
            ],
            [
                'id' => 8,
                'kategori' => 4,
                'harga_jual' => 168531.00,
            ],
            [
                'id' => 9,
                'kategori' => 4,
                'harga_jual' => 28000.00,
            ],
            [
                'id' => 10,
                'kategori' => 6,
                'harga_jual' => 2313600.00,
            ],
            [
                'id' => 11,
                'kategori' => 6,
                'harga_jual' => 113850.00,
            ],
            [
                'id' => 12,
                'kategori' => 3,
                'harga_jual' => 100900.00,
            ],
            [
                'id' => 13,
                'kategori' => 3,
                'harga_jual' => 249000.00,
            ],
            [
                'id' => 14,
                'kategori' => 3,
                'harga_jual' => 24900.00,
            ],
            [
                'id' => 15,
                'kategori' => 5,
                'harga_jual' => 36000.00,
            ],
            [
                'id' => 16,
                'kategori' => 1,
                'harga_jual' => 85000.00,
            ],
            [
                'id' => 17,
                'kategori' => 1,
                'harga_jual' => 27000.00,
            ],
        ];
    }
}
