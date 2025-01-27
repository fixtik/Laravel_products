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
        for ($i = 1; $i < 4; $i++) {
            DB::table('users')->insert([
                'id' => $i,
                'name' => 'user '.$i,
                'email' => 'root'.$i .'@mail.com',
                'password' => Hash::make('12345'. $i),
                ]);
        }
    }
}
