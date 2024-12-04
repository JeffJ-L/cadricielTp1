<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etudiants = Etudiant::all();

        foreach ($etudiants as $etudiant) {
            User::create([
                'name' => $etudiant->nom,
                'email' => $etudiant->email,
                'password' => Hash::make('123456'), // Default password
            ]);
        }
    }
}
