<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'job_id' => '1',
            'selection_id' => '1',
            'location' => 'PT CBI',
            'provision' => 'Karawang',
            'date' => '2023-09-04',
            'time' => '08:00',
            'status' => '1'
        ]);

        Schedule::create([
            'job_id' => '1',
            'selection_id' => '2',
            'location' => 'PT CBI',
            'provision' => 'Karawang',
            'date' => '2023-09-06',
            'time' => '08:00',
            'status' => '1'
        ]);

        Schedule::create([
            'job_id' => '1',
            'selection_id' => '3',
            'location' => 'PT CBI',
            'provision' => 'Karawang',
            'date' => '2023-09-08',
            'time' => '08:00',
            'status' => '1'
        ]);
    }
}
