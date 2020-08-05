<?php

use Illuminate\Database\Seeder;
use App\Komik;

class KomikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $komik = new \App\Komik;

        $komik->judul = "Naruto Shipuden";
        $komik->slug = \Str::slug("Naruto Shipuden");
        $komik->penulis = "Mahashi Kishimoto";
        $komik->penerbit = "Shonen Jump";
        $komik->tebal_komik = 50;
        $komik->harga_sewa = 150000;

        $komik->save();

        $this->command->info("Seeder Komik Berhasil");
    }
}
