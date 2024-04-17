<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Benutzer mit verschiedenen Rollen erstellen
        $arzt = User::create([
            'name' => 'Dr. Max Mustermann',
            'email' => 'arzt@example.com',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name', 'Arzt')->first()->id,
        ]);

        $krankenkasse = User::create([
            'name' => 'Krankenkasse XYZ',
            'email' => 'krankenkasse@example.com',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name', 'Krankenkasse')->first()->id,
        ]);

        $apotheke = User::create([
            'name' => 'Apotheke Apotheke',
            'email' => 'apotheke@example.com',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name', 'Apotheke')->first()->id,
        ]);
    }
}
