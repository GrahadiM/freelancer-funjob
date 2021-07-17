<?php

namespace Database\Seeders;

use App\Models\Kota;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = collect([
            'Jakarta Pusat',
            'Jakarta Utara',
            'Jakarta Timur',
            'Jakarta Selatan',
            'Jakarta Barat',
        ]);
        
        $item->each(function($item){
            Kota::create([
                'name' => $item,
                'slug' => Str::slug($item),
            ]);
        });
    }
}
