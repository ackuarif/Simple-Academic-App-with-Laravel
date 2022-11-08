<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nim' => 100,
                'nama' => 'Achmad Kumail Arif',
                'email' => 'arif@laravel.com',
                'alamat' => 'Probolinggo',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nim' => 101,
                'nama' => 'Budi',
                'email' => 'budi@laravel.com',
                'alamat' => 'Malang',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];

        \DB::table('mahasiswa')->insert($data);
    }
}
