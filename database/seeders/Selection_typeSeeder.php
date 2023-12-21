<?php

namespace Database\Seeders;

use App\Models\Selection_type;
use Illuminate\Database\Seeder;

class Selection_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Selection_type::create([
            'name' => 'Psikotes '
        ]);

        Selection_type::create([
            'name' => 'Tes Praktik'
        ]);

        Selection_type::create([
            'name' => 'Tes Wawancara'
        ]);
    }
}
