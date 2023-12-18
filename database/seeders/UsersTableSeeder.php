<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = DB::table('users')->insertGetId([
            'name' => 'admin',
            'user_code' => 'usr1234', // Replace with an appropriate code
            'email' => 'k@mcminn.no',
            'email_verified_at' => now(),
            'password' => Hash::make('ro3266ss'), // Hashing the password
            // Add other fields if necessary, or leave them as default/null
        ]);

        $this->createTeam($userId);
    }
    protected function createTeam($userId)
    {
        $teamId = DB::table('teams')->insertGetId([
            'user_id' => $userId,
            'team_code' => 'tm1234', // unique team code
            'name' => 'Admin Team',
            'personal_team' => true,
            // Other fields can have default values or specific values as needed
        ]);

        DB::table('team_user')->insert([
            'team_id' => $teamId,
            'user_id' => $userId,
            'role' => 'admin',
        ]);
    }
}
