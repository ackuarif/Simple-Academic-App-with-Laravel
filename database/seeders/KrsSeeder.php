<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KrsSeeder extends Seeder
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
                'nim' => 100,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kd_matkul' => 'MK2',
                'nim' => 100,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];

        \DB::table('krs')->insert($data);
    }
}
