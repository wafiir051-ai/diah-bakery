<?php

namespace Database\Seeders;

use App\Models\Kue;
use Illuminate\Database\Seeder;

class KueSeeder extends Seeder
{
    /**
     * Katalog awal dibuat dari foto di public/uploads.
     * Harga Rp 10.000 dan stok 10 hanya sementara; ubah lewat halaman admin.
     */
    public function run(): void
    {
        $products = [
            ['Cromboloni', 'Cromboloni', '1778209867_cromboloni.png'],
            ['Cromboloni Coklat', 'Cromboloni', '1780025584_crombolonicklt.jpg'],
            ['Cromboloni Matcha', 'Cromboloni', '1780025831_crombolonimtch.jpg'],
            ['Berry Cake', 'Cake', '1779506688_berrycake.jpg'],
            ['Bolu Pandan', 'Bolu', '1780023783_bolu pandan.jpg'],
            ['Risol Mayo', 'Gurih', '1780025723_risol mayo.jpg'],
            ['Nastar', 'Kue Kering', '1780035857_nastar.jpg'],
            ['Dorayaki', 'Dorayaki', '1780115726_dorayaki.jpg'],
            ['Donat Salju', 'Donat', '1780115800_donat salju.jpg'],
            ['Kue Ulang Tahun', 'Kue Ulang Tahun', '1780115887_kueultah.jpg'],
            ['Balon Random', 'Lainnya', '1780713845_balon random.jpg'],
        ];

        foreach ($products as [$nama, $kategori, $foto]) {
            Kue::updateOrCreate(
                ['nama' => $nama],
                [
                    'rasa_kategori' => $kategori,
                    'harga' => 10000,
                    'stock' => 10,
                    'foto' => $foto,
                    'deskripsi' => 'Dibuat segar oleh Diah Bakery.',
                ]
            );
        }
    }
}
