<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 'nama','email','no_hp','umur','jenis_kelamin','deskripsi','id_user'
        $profiles = [
            [
                'nama' => 'Rezka Wildan Nurhadi Bakri',
                'email' => 'rreska9@gmail.com',
                'no_hp' => '011581233',
                'umur' => 19,
                'jenis_kelamin' => 'laki-laki',
                'deskripsi' => 'Pandai Memanajemen Waktu',
                'id_user' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Profile::insert($profiles);
    }
}
