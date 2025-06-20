<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert ([
            [
                'name' => 'Himki',
                'email' => 'test@gmail.com',
                'password' => Hash::make('test1234'),            
            ],
            [
                'name' => 'Fadhlur',
                'email' => 'fadhlur@gmail.com',
                'password' => Hash::make('fadhlur123'),
            ]
            ]);
    }
}
