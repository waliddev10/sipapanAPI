<?php

use Database\Seeders\AdminSeeder;
use Database\Seeders\CaraPelaporanSeeder;
use Database\Seeders\HariLiburSeeder;
use Database\Seeders\JenisUsahaSeeder;
use Database\Seeders\KotaPenandatanganSeeder;
use Database\Seeders\MasaPajakSeeder;
use Database\Seeders\NpaSeeder;
use Database\Seeders\PenandatanganSeeder;
use Database\Seeders\TarifPajakSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(KotaPenandatanganSeeder::class);
        $this->call(PenandatanganSeeder::class);
        $this->call(JenisUsahaSeeder::class);
        $this->call(MasaPajakSeeder::class);
        $this->call(TarifPajakSeeder::class);
        $this->call(CaraPelaporanSeeder::class);
        $this->call(NpaSeeder::class);
        $this->call(HariLiburSeeder::class);
    }
}
