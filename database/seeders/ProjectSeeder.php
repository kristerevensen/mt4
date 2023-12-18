<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have a user and team from your UsersTableSeeder
        $user = User::where('email', 'k@mcminn.no')->first();
        $team = Team::where('user_id', $user->id)->first();
        if ($user && $team) {
            for ($i = 1; $i <= 10; $i++) {
                DB::table('projects')->insert([
                    'name' => 'Project ' . $i,
                    'owner_id' => $user->id,
                    'team_id' => $team->id,
                    'domain' => 'domain'.$i.'.no',
                    'language' => 'no',
                    'country' => 'Norway',
                    'categories' => serialize([ 'Category 1', 'Category 2', 'Category 3' ]),
                    'description'=> 'Project ' . $i . ' Description',
                    'project_code' => 'P' . str_pad($i, 8, "0", STR_PAD_LEFT), // Generates P00000001, P00000002, etc.
                ]);
            }
        }
    }
}
