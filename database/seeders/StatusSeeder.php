<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::truncate();
        $status = collect([
            'active',
            'non-active',
        ]);
        
        $status->each(function($status){
            Status::create([
                'name' => $status,
                'slug' => Str::slug($status),
            ]);
        });
    }
}
