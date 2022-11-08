<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('admin'),
                'type'=>'admin',
            ],
            [
                'name'=>'Achmad Kumail Arif',
                'email'=>'arif@laravel.com',
                'password'=>Hash::make('arif'),
                'type'=>'mahasiswa',
            ],
            [
                'name'=>'Budi',
                'email'=>'budi@laravel.com',
                'password'=>Hash::make('budi'),
                'type'=>'mahasiswa',
            ],
        ];
        
        User::insert($data);
    }
}
