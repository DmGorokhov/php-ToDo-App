<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{
    ToDoList,
    Task,
    };

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Task::class;


    public function definition(): array
    {
        return [
            'todoList' => ToDoList::inRandomOrder()->first()->id,
            'name' => $this->faker->word(),
            'progress' => $this->faker->randomElement(['active', 'completed']),
        ];
    }
}
