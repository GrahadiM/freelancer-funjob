<?php

namespace Database\Seeders;

use App\Models\Pesanan;
use Illuminate\Database\Seeder;

class PesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pesanan::truncate();
        $pesanan = [
            [
                'user_id' => 6,
                'jasa_id' => 1,
                'start_contract' => '2021-08-01',
                'end_contract' => '2021-12-01',
                'price' => '12.000.000,00',
                'note' => 'Tolong jadi penjaga kontrakan saya ya mas',
                'status' => 'Pending',
            ],
            [
                'user_id' => 7,
                'jasa_id' => 2,
                'start_contract' => '2021-07-01',
                'end_contract' => '2022-02-01',
                'price' => '14.000.000,00',
                'note' => 'Tolong berikan suasana nyaman pada halaman rumah saya',
                'status' => 'Pending',
            ],
        ];
        
        foreach ($pesanan as $key => $value) {
            Pesanan::create($value);
        }
    }
}
