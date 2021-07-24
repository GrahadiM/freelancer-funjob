<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = [
            [
                'name' => 'Abdurrahman Grahadi Maulana',
                'role_id' => 1,
                'status_id' => 1,
                'kota_id' => 1,
                'kecamatan_id' => 1,
                'phone' => '085767113554',
                'gender' => 'pria',
                // 'image' => 'assets/dist/assets/images/avatar/avatar-s-1.png',
                'image' => 'avatar-s-1.png',
                'email' => 'grahadim178@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Admin',
                'role_id' => 1,
                'status_id' => 1,
                'kota_id' => 1,
                'kecamatan_id' => 1,
                'phone' => '085767113554',
                'gender' => 'pria',
                // 'image' => 'assets/dist/assets/images/avatar/avatar-s-1.png',
                'image' => 'avatar-s-2.png',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Abdurrahman GM',
                'role_id' => 2,
                'status_id' => 2,
                'kota_id' => 1,
                'kecamatan_id' => 1,
                'phone' => '085767113554',
                'gender' => 'pria',
                // 'image' => 'assets/dist/assets/images/avatar/avatar-s-1.png',
                'image' => 'avatar-s-1.png',
                'email' => 'grahadim00@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Galih',
                'role_id' => 2,
                'status_id' => 2,
                'kota_id' => 1,
                'kecamatan_id' => 1,
                'phone' => '085767113554',
                'gender' => 'pria',
                // 'image' => 'assets/dist/assets/images/avatar/avatar-s-1.png',
                'image' => 'avatar-s-2.png',
                'email' => 'galih@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Fikri',
                'role_id' => 2,
                'status_id' => 2,
                'kota_id' => 1,
                'kecamatan_id' => 1,
                'phone' => '085767113554',
                'gender' => 'pria',
                // 'image' => 'assets/dist/assets/images/avatar/avatar-s-1.png',
                'image' => 'avatar-s-3.png',
                'email' => 'fikri@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Hadoy',
                'role_id' => 3,
                'status_id' => 2,
                'kota_id' => 1,
                'kecamatan_id' => 1,
                'phone' => '085767113554',
                'gender' => 'pria',
                // 'image' => 'assets/dist/assets/images/avatar/avatar-s-1.png',
                'image' => 'avatar-s-4.png',
                'email' => 'grahadim232@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Ahok',
                'role_id' => 3,
                'status_id' => 2,
                'kota_id' => 1,
                'kecamatan_id' => 1,
                'phone' => '085767113554',
                'gender' => 'pria',
                // 'image' => 'assets/dist/assets/images/avatar/avatar-s-1.png',
                'image' => 'avatar-s-5.png',
                'email' => 'ahok@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Joko',
                'role_id' => 3,
                'status_id' => 2,
                'kota_id' => 1,
                'kecamatan_id' => 1,
                'phone' => '085767113554',
                'gender' => 'pria',
                // 'image' => 'assets/dist/assets/images/avatar/avatar-s-1.png',
                'image' => 'avatar-s-6.png',
                'email' => 'joko@gmail.com',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(60),
            ],
        ];
        
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
