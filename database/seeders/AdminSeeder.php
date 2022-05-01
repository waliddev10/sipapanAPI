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
            'nama' => 'Adelia Ayuningtyas Widiyanto',
            'nip' => '200101022022012002',
            'jabatan' => 'Pengelola Pendapatan',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('@dmin')
        ]);
    }
}
