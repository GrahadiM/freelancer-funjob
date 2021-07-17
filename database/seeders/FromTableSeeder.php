<?php

namespace Database\Seeders;

use App\Models\From;
use Illuminate\Database\Seeder;

class FromTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        From::truncate();
        $pesan = [
            [
                'user_id' => 1,
                'message' => "Jangan membuat pelanggan menunggu anda terlalu lama!!",
            ],
            [
                'user_id' => 3,
                'message' => "Baik min, segera saya ambil pesanannya..",
            ],
            [
                'user_id' => 1,
                'message' => "Hati-hati, ini peringatan pertama!!",
            ],
        ];
        
        foreach ($pesan as $key => $value) {
            From::create($value);
        }
    }
}
