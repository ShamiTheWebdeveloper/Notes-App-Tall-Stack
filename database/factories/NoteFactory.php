<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=>$this->faker->uuid,
            'user_id'=>User::factory(),
            'title'=>$this->faker->words(3,true),
            'body'=>$this->faker->paragraph,
            'recipient'=>$this->faker->email,
            'send_date'=>$this->faker->dateTimeBetween(now(),'+1 year'),
            'is_published'=>$this->faker->boolean(100),
            'heart_count'=>$this->faker->numberBetween(0,100),
        ];
    }
}
