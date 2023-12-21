<?php

namespace Database\Seeders;

use \App\Models\Job;
use \App\Models\User;
use App\Models\gender;
use App\Models\Schedule;
use App\Models\education;
use \App\Models\Selection_type;
use Database\Seeders\JobSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use App\Models\Personal_identity;
use Database\Seeders\GenderSeeder;
use App\Models\Personal_identities;
use Database\Seeders\ScheduleSeeder;
use Database\Seeders\Selection_typeSeeder;
use Database\Seeders\Personal_identitySeeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call(educationSeeder::class);
    $this->call(GenderSeeder::class);
    $this->call(JobSeeder::class);
    $this->call(Selection_typeSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(ScheduleSeeder::class);
    $this->call(Personal_identitySeeder::class);
  }
}
