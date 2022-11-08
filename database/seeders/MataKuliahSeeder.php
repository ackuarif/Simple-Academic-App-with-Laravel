<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
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
                'kd_matkul' => 'MK1',
                'nama' => 'Workshop Framework',
                'sks' => 2,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kd_matkul' => 'MK2',
                'nama' => 'Workshop Cloud Computing',
                'sks' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];

        \DB::table('mata_kuliah')->insert($data);
    }
}
