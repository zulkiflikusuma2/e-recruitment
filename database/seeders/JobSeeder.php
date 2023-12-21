<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'position' => 'Maintenance',
            'slug' => 'Maintenance',
            'requirement' => '
              1. Pria
              2. Usia 19-24 tahun
              3. Pendidikan min. SMA/SMK Sederajat
              4. Pengalaman min. 1 tahun di bidang terkait
              5. Belum menikah
            ',
            'attachment' => '
            1. Curriculum Vitae
            2. Surat Lamaran
            3. Pas Foto Berwarna
            4. Foto KTP
            5. Transkip Nilai
            6. Dan Dokumen Pendukung Lainnya  
            ',
            'approval' => '1',
            'close_date' => '2023-08-30',
            'announ_date' => '2023-09-30',
            'published_at' => '2023-07-16'
        ]);
    }
}
