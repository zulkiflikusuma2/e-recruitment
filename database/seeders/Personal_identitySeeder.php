<?php

namespace Database\Seeders;

use App\Models\Personal_identity;
use Illuminate\Database\Seeder;

class Personal_identitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Personal_identity::create([
            'user_id' => '3',
            'name' => 'Zulkifli Kusuma',
            'gender_id' => '1',
            'dob' => '1999-06-17',
            'edu_id' => '1',
            'address' => 'Karawang',
            'phone' => '08120000000',
        ]);
    }
}
