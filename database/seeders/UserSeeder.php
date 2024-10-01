<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'carlilos',
            'email' => 'cags20031@gmail.com',
            'password' => bcrypt('api2024'),
            'remember_token' => Str::random(10),
        ]);
    }
}
