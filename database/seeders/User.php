<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'fullname' => 'Admin',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_admin' => 1,
            'nomor_hp' => '081234567890'
        ]);

        DB::table('users')->insert([
            'username' => 'user',
            'email' => 'user@gmail.com',
            'fullname' => 'User',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_admin' => 0,
            'nomor_hp' => '081234567899'
        ]);

    }
}
