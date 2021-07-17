<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            StatusSeeder::class,
            KotaSeeder::class,
            KecamatanSeeder::class,
            UserSeeder::class,
            KategoriSeeder::class,
            JasaSeeder::class,
            PesanSeeder::class,
            KomentarSeeder::class,
            ToTableSeeder::class,
            FromTableSeeder::class,
            InboxTableSeeder::class,
        ]);
    }
}
