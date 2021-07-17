<?php

namespace Database\Seeders;

use App\Models\KategoriJasa;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriJasa::truncate();
        $kategori = collect([
            'cuci',
            'supir',
            'penjaga',
            'asuh anak',
            'rawat jompo',
            'tukang kebun',
            'one day service',
        ]);
        
        $kategori->each(function($kategori){
            KategoriJasa::create([
                'name' => $kategori,
                'slug' => Str::slug($kategori),
            ]);
        });
    }
}
