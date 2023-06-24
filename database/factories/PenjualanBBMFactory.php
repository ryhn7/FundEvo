<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PenjualanBBM;


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
    protected $model = PenjualanBBM::class;
    public function definition()
    {
        $startDate = '2023-01-01';
        $endDate = '2023-06-26';
        $items = [
            [
                'id' => 1,
                'harga_jual' => 10000.00,
            ],
            [
                'id' => 2,
                'harga_jual' => 13500.00,
            ],
            [
                'id' => 3,
                'harga_jual' => 7000.00,
            ],
            [
                'id' => 4,
                'harga_jual' => 9000.00,
            ],
        ];
        $item = $this->faker->randomElement($items);
        $date = $this->generateRandomDate($startDate, $endDate);
        $stockAwal = $this->getStockAwal($item['id'], $startDate);
        if ($stockAwal === null) {
            $stockAwal = $this->faker->numberBetween(1000, 8000);
        }
        $penerimaan = $this->faker->randomElement([0, $this->faker->numberBetween(8000, 16000)]);
        $maxStockAdm = $stockAwal + $penerimaan;
        $stockAdm = $this->faker->numberBetween(1000, $maxStockAdm);
        if ($stockAdm > $maxStockAdm) {
            $stockAdm = $maxStockAdm;
        }
        $penjualan = ($stockAwal + $penerimaan) - $stockAdm;
        $stockFakta = $this->faker->numberBetween($stockAdm - 100, $stockAdm);
        $pendapatan = $penjualan * $item['harga_jual'];
        $result = $stockAdm - $stockFakta;

        if ($result > 0) {
            $penyusutan = $result * -1;
        } else if ($result < 0) {
            $penyusutan = $result * -1;
        } else {
            $penyusutan = 0;
        }

        return [
            'bbm_id' => $item['id'],
            'stock_awal' => $stockAwal,
            'penerimaan' => $penerimaan,
            'penjualan' => $penjualan,
            'stock_adm' => $stockAdm,
            'stock_fakta' => $stockFakta,
            'penyusutan' => $penyusutan,
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
        return $this->model::where('bbm_id', $itemId)
            ->whereDate('created_at', '<=', $startDate)
            ->orderBy('created_at', 'desc')
            ->value('stock_adm');
    }
}
