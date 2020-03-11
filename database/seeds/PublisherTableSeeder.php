<?php

use Illuminate\Database\Seeder;
use App\Publisher;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* factory(Publisher::class, 30)->create(); */
        $data = [
            [
                'name' => ' Nhà Xuất bản Chính trị quốc gia',
                'phone' => '09-032-16556',
                'address' => '22-24 Quang Trung, Hà Nội',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nhà xuất bản thành phố Hồ Chí Minh',
                'phone' => '08-822-5340',
                'address' => '62, Nguyễn Thị Minh Khai, Q.1, Thành phố Hồ Chí Minh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nhà xuất bản Kim đồng',
                'phone' => '943-4730 / 943-9001 ',
                'address' => '55 Quang Trung Hà Nội',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nhà xuât bản Trẻ',
                'phone' => '08-931-6211',
                'address' => '161B, Lý Chính Thắng, Q.3, Tp Hoồ Chí Minh',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'name' => 'Nhà xuât bản Văn học',
                'phone' => '829-4782',
                'address' => '18 Nguyễn Trường Tộ, Hà Nội',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('publishers')->insert($data);
    }
}
