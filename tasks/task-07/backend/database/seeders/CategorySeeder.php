<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        DB::table('categories')->insert([
            [
                'name' => 'Work',
                'description' => 'Tasks and projects related to my job.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Personal',
                'description' => 'Personal errands and chores around the house.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Fitness',
                'description' => 'Gym, running, and meal prep.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Study',
                'description' => 'Courses, reading, and learning new skills.',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
