<?php

namespace Database\Seeders;

use App\Models\Jasa;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class JasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jasa::truncate();
        $jasa = [
            [
                'name' => 'Pengamanan Rumah Terbaik',
                'slug' => Str::slug('name'),
                'user_id' => 3,
                'kategori_id' => 3,
                'image' => 'avatar-s-1.png',
                'price' => '3.000.000,00',
                'desc' => 'Sertifikat security dengan nilai terbaik pada tahun 2010-2011 dan tahun 2015-2016',
                'status' => 'non-active',
            ],
            [
                'name' => 'Kebun Terasku',
                'slug' => Str::slug('name'),
                'user_id' => 4,
                'kategori_id' => 6,
                'image' => 'avatar-s-1.png',
                'price' => '2.000.000,00',
                'desc' => 'Saya buat kebun anda menjadi indah, membuat suasana rumah terasa lebih nyaman dipandang',
                'status' => 'non-active',
            ],
        ];
        
        foreach ($jasa as $key => $value) {
            Jasa::create($value);
        }
    }
}
