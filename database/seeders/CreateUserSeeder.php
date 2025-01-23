<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'user 1',
            'email' => 'root@mail.com',
            'password' => Hash::make('12345'),
        ]);
        for ($i = 2; $i < 5; $i++) {
            DB::table('users')->insert([
                'id' => $i,
                'name' => 'user '.$i,
                'email' => 'root'.$i .'@mail.com',
                'password' => Hash::make('12345'. $i),
                ]);
        }
    }
}
