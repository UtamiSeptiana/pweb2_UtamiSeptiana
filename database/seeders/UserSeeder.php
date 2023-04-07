<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create(
            [
                'nama'=>'Utami Septiana',
                'level'=>'Admin',
                'email'=>'utamiseptiana0@gmail.com',
                'password'=>bcrypt('12345'),
                'remember_token'=> Str::random(60),
            ]
            );
    }
}
