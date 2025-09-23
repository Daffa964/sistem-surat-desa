<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\DataWarga;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin Desa',
            'email' => 'admin@desa.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Create kepala desa user
        $kepalaDesa = User::create([
            'name' => 'Kepala Desa',
            'email' => 'kepala@desa.com',
            'password' => Hash::make('password'),
            'role' => 'kepala_desa'
        ]);

        // Create sample warga user
        $warga = User::create([
            'name' => 'Warga Desa',
            'email' => 'warga@desa.com',
            'password' => Hash::make('password'),
            'role' => 'warga'
        ]);

        // Create data warga for the sample warga
        DataWarga::create([
            'user_id' => $warga->id,
            'nik' => '1234567890123456',
            'no_kk' => '1234567890123456',
            'alamat' => 'Jl. Merdeka No. 1, Desa Sejahtera',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'Laki-laki'
        ]);
    }
}
