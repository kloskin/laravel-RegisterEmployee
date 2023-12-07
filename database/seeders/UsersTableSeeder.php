<?php

namespace Database\Seeders;

use App\Models\WorkedHours;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Comments;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Nowi uzytkownicy z komentarzami i godzinami
//          User::factory(10)->has(Comments::factory(10))->has(WorkedHours::factory()->count(20))->create();


//      Dodanie komentarzy do istniejących użytkowników
            $users = User::all();
            $users->each(function ($user) {
                $commentsCount = rand(2, 4);

                Comments::factory()->count($commentsCount)->create([
                    'user_id' => $user->id,
                ]);
            });
    }
}
