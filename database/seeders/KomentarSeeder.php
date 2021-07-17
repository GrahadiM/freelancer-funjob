<?php

namespace Database\Seeders;

use App\Models\Komentar;
use Illuminate\Database\Seeder;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Komentar::truncate();
        $komentar = [
            [
                'user_id' => 6,
                'jasa_id' => 1,
                'comment' => 'Penjaga terpercaya',
                'star' => 5,
            ],
            [
                'user_id' => 7,
                'jasa_id' => 2,
                'comment' => 'Bagus',
                'star' => 4,
            ],
        ];
        
        foreach ($komentar as $key => $value) {
            Komentar::create($value);
        }
    }
}
