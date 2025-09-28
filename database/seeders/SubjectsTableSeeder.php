<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            ['id' => 1, 'name' => 'ENGLISH', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 2, 'name' => 'ENGLISH/W', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 3, 'name' => 'ENGLISH/O', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 4, 'name' => 'URDU', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 5, 'name' => 'URDU/W', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 6, 'name' => 'URDU/O', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 7, 'name' => 'MATHEMATICS', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 8, 'name' => 'MATH/W', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 9, 'name' => 'MATH/O', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 10, 'name' => 'DRAWING', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 11, 'name' => 'TABLE BOOK', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 12, 'name' => 'ISLAMIAT', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 13, 'name' => 'ISLAMIAT READING', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 14, 'name' => 'SCIENCE', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 15, 'name' => 'PAK STUDY', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 16, 'name' => 'GEOGRAPHY', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 17, 'name' => 'G.SCIENCE', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 18, 'name' => 'BIOLOGY', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 19, 'name' => 'COMPUTER', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 20, 'name' => 'PHYSICS', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 21, 'name' => 'ISLAMIAT ELECTIVE', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 22, 'name' => 'CHEMISTRY', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 23, 'name' => 'EDUCATION', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 24, 'name' => 'PUNJABI', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 25, 'name' => 'CIVICS', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 26, 'name' => 'G.K', 'created_at' => '2021-12-27 16:31:08', 'updated_at' => null],
            ['id' => 27, 'name' => 'BIOLOGY/COMPUTER', 'created_at' => '2022-01-01 11:32:00', 'updated_at' => null],
            ['id' => 28, 'name' => 'HOME WORK', 'created_at' => '2023-01-11 09:28:54', 'updated_at' => null],
            ['id' => 29, 'name' => 'ISLAMIAT TRANSLATION', 'created_at' => '2023-01-11 09:28:54', 'updated_at' => null],
        ];

        foreach ($subjects as $subject) {
            \DB::table('subjects')->insert($subject);
        }
    }
}
