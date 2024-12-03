<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.id',
                'password' => Hash::make('12345678'),
                'role' => 'Admin'
            ],
            [
                'name' => 'PT.Pupuk',
                'email' => 'pupuk@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'Penyedia'
            ],
            [
                'name' => 'Apple',
                'email' => 'apple@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'Penyedia'
            ],
            [
                'name' => 'Rezka Wildan Nurhadi Bakri',
                'email' => 'rreska9@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'Pelamar'
            ],
        ];
        
        User::insert($users);
    }
}
