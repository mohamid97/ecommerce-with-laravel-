<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $user = User::create([
            'firstName' => Str::random(10),
            'lastName' => Str::random(10),
            'email' => 'mohamed@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $user->attachRole('super_admin');

    }
}
