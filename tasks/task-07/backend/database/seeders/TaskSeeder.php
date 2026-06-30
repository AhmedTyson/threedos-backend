<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Assuming categories were created in order (IDs 1, 2, 3, 4)
        DB::table('tasks')->insert([
            [
                'category_id' => 1, // Work
                'title' => 'Finish API Documentation',
                'description' => 'Write Postman documentation and export the collection.',
                'due_date' => Carbon::tomorrow()->toDateString(),
                'is_completed' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 1, // Work
                'title' => 'Fix Telescope UI filters',
                'description' => 'Resolve SQLite compatibility bugs in the custom Telescope package.',
                'due_date' => Carbon::today()->toDateString(),
                'is_completed' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 2, // Personal
                'title' => 'Buy groceries',
                'description' => 'Milk, eggs, bread, and coffee.',
                'due_date' => Carbon::today()->toDateString(),
                'is_completed' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 3, // Fitness
                'title' => 'Go for a run',
                'description' => 'Run 5 kilometers in the park.',
                'due_date' => Carbon::tomorrow()->toDateString(),
                'is_completed' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 4, // Study
                'title' => 'Learn Laravel Eloquent Relationships',
                'description' => 'Read documentation on One-to-Many and Many-to-Many relationships.',
                'due_date' => Carbon::now()->addDays(3)->toDateString(),
                'is_completed' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
