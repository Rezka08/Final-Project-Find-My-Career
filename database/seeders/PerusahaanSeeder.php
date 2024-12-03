<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perushaans = [
            [
                'namaCompany' => 'Apple',
                'detail' => 'Apple adalah perusahaan teknologi multinasional yang berbasis di Cupertino, California. Didirikan pada tahun 1976 oleh Steve Jobs, Steve Wozniak, dan Ronald Wayne, Apple dikenal sebagai inovator dalam bidang perangkat keras, perangkat lunak, dan layanan digital. Produk ikoniknya termasuk iPhone, iPad, Mac, Apple Watch, dan layanan seperti App Store, iCloud, serta Apple Music.',
                'id_user' => 2,
            ],
            [
                'namaCompany' => 'Google',
                'detail' => 'Google adalah perusahaan teknologi global yang didirikan pada tahun 1998 oleh Larry Page dan Sergey Brin. Berkantor pusat di Mountain View, California, Google terkenal dengan mesin pencari yang menjadi andalannya, serta ekosistem layanan digital seperti Android, Google Maps, YouTube, dan Google Drive. Sebagai bagian dari Alphabet Inc., Google terus mengembangkan inovasi dalam kecerdasan buatan, cloud computing, dan produk lainnya untuk meningkatkan kehidupan sehari-hari miliaran pengguna di seluruh dunia.',
                'id_user' => 3,
            ],            
        ];

        Perusahaan::insert($perushaans);
    }
}
