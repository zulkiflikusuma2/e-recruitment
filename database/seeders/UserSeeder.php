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
            'email' => 'pichrd@gmail.com',
            'username' => 'PIC HRD',
            'password' => bcrypt('admin'),
            'role' => 'superadmin',
            'last_login_at' => '1'
        ]);

        User::create([
            'email' => 'stafhrd@gmail.com',
            'username' => 'STAF HRD',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'last_login_at' => '1'
        ]);

        User::create([
            'email' => 'zulkifli@gmail.com',
            'username' => 'zull',
            'password' => bcrypt('admin'),
            'role' => 'applicant',
            'last_login_at' => '1'
        ]);
    }
}
