<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* factory(Genre::class, 20)->create(); */
        $data = [
            [
                'name' => 'Lịch sử',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Văn hóa - nghệ thuật',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kinh tế - chính trị',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tâm linh - tôn giáo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Văn học',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('genres')->insert($data);
    }
}
