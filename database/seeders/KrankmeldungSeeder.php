<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KrankmeldungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dummy-Daten für Krankmeldungen erstellen
        DB::table('krankmeldungen')->insert([
            'patient_id' => 1,
            'start_date' => now(),
            'end_date' => now()->addDays(3),
            'reason' => 'Dummy reason for Krankmeldung',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
    }
}
