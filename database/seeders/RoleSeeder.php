<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        $role = collect([
            'admin',
            'art',
            'klien',
        ]);
        
        $role->each(function($role){
            Role::create([
                'name' => $role,
                'slug' => Str::slug($role),
            ]);
        });
    }
}
