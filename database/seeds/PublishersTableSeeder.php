<?php

use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('publishers')->delete();

        \DB::table('publishers')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Nhà Xuất bản Chính trị quốc gia',
                'address' => '22-24 Quang Trung, Hà Nội',
                'phone' => '09-032-16556',
                'created_at' => '2020-04-22 03:34:10',
                'updated_at' => '2020-04-22 03:34:10',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Nhà xuất bản thành phố Hồ Chí Minh',
                'address' => '62, Nguyễn Thị Minh Khai, Q.1, Thành phố Hồ Chí Minh',
                'phone' => '08-822-5340',
                'created_at' => '2020-04-22 03:34:10',
                'updated_at' => '2020-04-22 03:34:10',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Nhà xuất bản Kim đồng',
                'address' => '55 Quang Trung Hà Nội',
                'phone' => '943-4730 / 943-9001 ',
                'created_at' => '2020-04-22 03:34:10',
                'updated_at' => '2020-04-22 03:34:10',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Nhà xuât bản Trẻ',
                'address' => '161B, Lý Chính Thắng, Q.3, Tp Hoồ Chí Minh',
                'phone' => '08-931-6211',
                'created_at' => '2020-04-22 03:34:10',
                'updated_at' => '2020-04-22 03:34:10',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Nhà xuât bản Văn học',
                'address' => '18 Nguyễn Trường Tộ, Hà Nội',
                'phone' => '829-4782',
                'created_at' => '2020-04-22 03:34:10',
                'updated_at' => '2020-04-22 03:34:10',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'NXB Bách Khoa - Hà Nội',
                'address' => 'Ngõ 17 Tạ Quang Bửu, Bách Khoa, Hai Bà Trưng, Hà Nội',
                'phone' => '024 3868 4569',
                'created_at' => '2020-04-22 03:37:37',
                'updated_at' => '2020-04-22 03:37:37',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'NXB Thế giới',
                'address' => '7 Nguyễn Thị Minh Khai, Bến Nghé, Quận 1, Hồ Chí Minh',
                'phone' => '028 3822 0102',
                'created_at' => '2020-04-22 03:58:08',
                'updated_at' => '2020-04-22 03:58:08',
            ),
        ));


    }
}
