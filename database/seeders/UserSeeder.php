<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'nama' => 'Andiko Yoga',
            'alamat' => 'Ds.Banaran',
            'email' => 'rizuna30@gmail.com',
            'no_hp' => '085157506552',
            'password' => bcrypt('12345'),
            'role' => 'Owner',
        ]);

        User::create([
            'nama' => 'Andiko',
            'alamat' => 'Ds.Banaran',
            'email' => 'rizuna31@gmail.com',
            'no_hp' => '085157506552',
            'password' => bcrypt('12345'),
            'role' => 'Admin',
        ]);

        User::create([
            'nama' => 'Yoga',
            'alamat' => 'Ds.Banaran',
            'email' => 'rizuna32@gmail.com',
            'no_hp' => '085157506552',
            'password' => bcrypt('12345'),
            'role' => 'Karyawan',
        ]);
    }
}
