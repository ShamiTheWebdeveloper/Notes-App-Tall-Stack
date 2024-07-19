<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
use Carbon\Carbon;
//use Cassandra\Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function (User $user){
            Note::factory()->count(100)->create([
                'user_id'=>$user->id,
            ]);
        });
    }
}
