<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nama' => 'Andiko Yoga',
                'alamat' => 'Ds.Banaran',
                'email' => 'rizuna30@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'Owner',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
