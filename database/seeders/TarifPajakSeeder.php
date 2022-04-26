<?php

namespace Database\Seeders;

use App\Models\TarifPajak;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class TarifPajakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return TarifPajak::create([
            'id' => Uuid::uuid4(),
            'nilai' => 10 / 100,
            'tgl_berlaku' => Carbon::yesterday(),
            'keterangan' => 'PERATURAN GUBERNUR KALIMANTAN TIMUR NO.10 TAHUN 2011',
        ]);
    }
}
