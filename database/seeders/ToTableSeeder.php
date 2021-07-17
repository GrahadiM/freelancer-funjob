<?php

namespace Database\Seeders;

use App\Models\To;
use Illuminate\Database\Seeder;

class ToTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        To::truncate();
        $to = collect([
            3,
            1,
            3,
        ]);
        
        $to->each(function($to){
            To::create([
                'user_id' => $to,
            ]);
        });
    }
}
