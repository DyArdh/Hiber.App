<?php

namespace Database\Seeders;

use App\Models\HargaProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        HargaProduct::create([
            'merk' => 'Cap Koala',
            'harga' => 12000,
        ]);

        HargaProduct::create([
            'merk' => 'Cap LL',
            'harga' => 12000,
        ]);

        HargaProduct::create([
            'merk' => 'Cap Laron',
            'harga' => 12000,
        ]);

        HargaProduct::create([
            'merk' => 'Cap SMJ',
            'harga' => 10000,
        ]);

        HargaProduct::create([
            'merk' => 'Cap 57',
            'harga' => 10000,
        ]);

        HargaProduct::create([
            'merk' => 'Polos',
            'harga' => 8500,
        ]);
    }
}
