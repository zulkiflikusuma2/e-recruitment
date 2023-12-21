<?php

namespace Database\Seeders;

use App\Models\education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        education::create([
            'name' => 'SMA/SMK'
        ]);

        education::create([
            'name' => 'Diploma III (D3)'
        ]);

        education::create([
            'name' => 'Diploma IV (D4)'
        ]);

        education::create([
            'name' => 'Sarjana (S1)'
        ]);
    }
}
