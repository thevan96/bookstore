<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genres')->delete();
        
        \DB::table('genres')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Lịch sử',
                'created_at' => '2020-04-22 03:34:10',
                'updated_at' => '2020-04-22 03:34:10',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Văn hóa - nghệ thuật',
                'created_at' => '2020-04-22 03:34:10',
                'updated_at' => '2020-04-22 03:34:10',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Kinh tế - chính trị',
                'created_at' => '2020-04-22 03:34:10',
                'updated_at' => '2020-04-22 03:34:10',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Tâm linh - tôn giáo',
                'created_at' => '2020-04-22 03:34:10',
                'updated_at' => '2020-04-22 03:34:10',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Văn học',
                'created_at' => '2020-04-22 03:34:10',
                'updated_at' => '2020-04-22 03:34:10',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Khoa học',
                'created_at' => '2020-04-22 03:36:13',
                'updated_at' => '2020-04-22 03:36:13',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Kỹ năng thường thức',
                'created_at' => '2020-04-22 03:56:45',
                'updated_at' => '2020-04-22 03:56:45',
            ),
        ));
        
        
    }
}