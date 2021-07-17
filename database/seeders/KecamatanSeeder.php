<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatan = collect([
        //Jakarta Pusat
            'Cempaka Putih',
            'Gambir',
            'Johar Baru',
            'Kemayoran',
            'Menteng',
            'Sawah Besar',
            'Senen',
            'Tanah Abang',
        //Jakarta Utara
            'Cilincing',
            'Kelapa Gading',
            'Koja',
            'Pademangan',
            'Penjaringan',
            'Tanjung Priok',
        //Jakarta Timur
            'Cakung',
            'Cipayung',
            'Ciracas',
            'Duren Sawit',
            'Jatinegara',
            'Kramat Jati',
            'Makasar',
            'Matraman',
            'Pasar Rebo',
            'Pulo Gadung',
        //Jakarta Selatan
            'Cilandak',
            'Jagakarsa',
            'Kebayoran Baru',
            'Kebayoran Lama',
            'Mampang Prapatan',
            'Pancoran',
            'Pasar Minggu',
            'Pesanggrahan',
            'Setiabudi',
            'Tebet',
        //Jakarta Barat
            'Cengkareng',
            'Grogol Petamburan',
            'Kalideres',
            'Kebon Jeruk',
            'Kembangan',
            'Palmerah',
            'Taman Sari',
            'Tambora',
        ]);
        
        $kecamatan->each(function($kecamatan){
            Kecamatan::create([
                'name' => $kecamatan,
                'slug' => Str::slug($kecamatan),
            ]);
        });
    }
}
