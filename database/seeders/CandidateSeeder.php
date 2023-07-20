<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'firstname' => 'Yassine',
            'lastname' => 'Ait',
            'email' => 'user1@email.com',
            'email_verified_at'=>now(),
            'password' => Hash::make('user1password'),
        ]);
    }
}
