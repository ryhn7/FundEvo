<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PenjualanItemListrik;


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
    protected $model = PenjualanItemListrik::class;
    public function definition()
    {
        $startDate = '2023-01-01';
        $endDate = '2023-06-07';
        $items = [
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
        $item = $this->faker->randomElement($items);
        $date = $this->generateRandomDate($startDate, $endDate);
        $stockAwal = $this->getStockAwal($item['id'], $startDate);
        if ($stockAwal === null) {
            $stockAwal = $this->faker->numberBetween(0, 100);
        }
        $penerimaan = $this->faker->numberBetween(100, 500);
        $penjualan = $this->faker->numberBetween(0, 100);
        $stockAkhir = $stockAwal + $penerimaan - $penjualan;
        $pendapatan = $penjualan * $item['harga_jual'];
        
        return [
            'item_id' => $item['id'],
            'kategori_id' => $item['kategori'],
            'stock_awal' => $stockAwal,
            'penerimaan' => $penerimaan,
            'penjualan' => $penjualan,
            'stock_akhir' => $stockAkhir,
            'penyusutan' => $this->faker->numberBetween(1, 50),
            'pendapatan' => $pendapatan,
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
    
    private function getStockAwal($itemId, $startDate)
    {
        return $this->model::where('item_id', $itemId)
            ->whereDate('created_at', '<=', $startDate)
            ->orderBy('created_at', 'desc')
            ->value('stock_akhir');
    }
}