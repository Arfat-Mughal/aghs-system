<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            ['id' => 1, 'name' => 'Play Group', 'created_at' => '2021-09-20 17:41:45', 'updated_at' => null],
            ['id' => 2, 'name' => 'Nursery', 'created_at' => '2021-09-20 17:41:45', 'updated_at' => null],
            ['id' => 3, 'name' => 'Prep', 'created_at' => '2021-09-20 17:42:29', 'updated_at' => null],
            ['id' => 4, 'name' => '1st', 'created_at' => '2021-09-20 17:42:29', 'updated_at' => null],
            ['id' => 5, 'name' => '2nd', 'created_at' => '2021-09-20 17:42:51', 'updated_at' => null],
            ['id' => 6, 'name' => '3rd', 'created_at' => '2021-09-20 17:42:51', 'updated_at' => null],
            ['id' => 7, 'name' => '4th', 'created_at' => '2021-09-20 17:43:02', 'updated_at' => null],
            ['id' => 8, 'name' => '5th', 'created_at' => '2021-09-20 17:43:02', 'updated_at' => null],
            ['id' => 9, 'name' => '6th', 'created_at' => '2021-09-20 17:43:22', 'updated_at' => null],
            ['id' => 10, 'name' => '7th', 'created_at' => '2021-09-20 17:43:22', 'updated_at' => null],
            ['id' => 11, 'name' => '8th', 'created_at' => '2021-09-20 17:43:56', 'updated_at' => null],
            ['id' => 12, 'name' => '9th ( Pre )', 'created_at' => '2021-09-20 17:43:56', 'updated_at' => null],
            ['id' => 13, 'name' => '9th ( Arts )', 'created_at' => '2021-12-20 07:56:36', 'updated_at' => null],
            ['id' => 14, 'name' => '9th ( Science )', 'created_at' => '2021-12-20 07:56:36', 'updated_at' => null],
            ['id' => 15, 'name' => '10th ( Arts )', 'created_at' => '2021-12-20 07:57:25', 'updated_at' => null],
            ['id' => 16, 'name' => '10th ( Science )', 'created_at' => '2021-12-20 07:57:25', 'updated_at' => null],
        ];

        foreach ($grades as $grade) {
            \DB::table('grades')->insert($grade);
        }
    }
}
