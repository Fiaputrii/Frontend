<?php 

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void {
        DB::table('users')->insert([
            [
                'username' => 'admin1',
                'password' => Hash::make('admin123'),
                'email' => 'admin@example.com',
                'alamat' => 'Jl. Admin No.1',
                'role' => 'admin',
            ],
            [
                'username' => 'mahasiswa1',
                'password' => Hash::make('mahasiswa123'),
                'email' => 'mhs@example.com',
                'alamat' => 'Jl. Mahasiswa No.2',
                'role' => 'mahasiswa',
            ],
            [
                'username' => 'dosen1',
                'password' => Hash::make('dosen123'),
                'email' => 'dosen@example.com',
                'alamat' => 'Jl. Dosen No.3',
                'role' => 'dosen',
            ],
        ]);
    }
}
