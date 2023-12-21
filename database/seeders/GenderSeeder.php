<?php

namespace Database\Seeders;

use App\Models\gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        gender::create([
            'name' => 'Laki-laki'
        ]);

        gender::create([
            'name' => 'Perempuan'
        ]);
    }
}
