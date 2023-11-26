<?php

namespace Database\Factories;

use App\Models\{
    User,
    ToDoList,
    };

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToDoList>
 */
class ToDoListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
     protected $model = ToDoList::class;
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'progress' => $this->faker->randomElement(['active', 'completed']),
            'todo_status' => $this->faker->randomElement(['private', 'public']),
            'owner' => User::inRandomOrder()->first()->id,
        ];
    }
}
