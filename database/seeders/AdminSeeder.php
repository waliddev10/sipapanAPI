<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Admin::create([
            'id' => Uuid::uuid4(),
            'nama' => 'Moh. Walid Arkham Sani',
            'nip' => '200008062022011001',
            'jabatan' => 'Pengelola Data Transaksi',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);
    }
}
