<?php

namespace Database\Seeders;

use App\Models\Inbox;
use Illuminate\Database\Seeder;

class InboxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inbox::truncate();
        $pesan = [
            [
                'from_id' => 1,
                'to_id' => 1,
            ],
            [
                'from_id' => 2,
                'to_id' => 2,
            ],
            [
                'from_id' => 3,
                'to_id' => 3,
            ],
        ];
        
        foreach ($pesan as $key => $value) {
            Inbox::create($value);
        }
    }
}
