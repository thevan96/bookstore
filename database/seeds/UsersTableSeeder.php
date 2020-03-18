<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Thế Văn',
                'avatar' => 'defautl_avatar',
                'email' => 'admin@gmail.com',
                'phone' => '123456789',
                'is_admin' => 1,
                'email_verified_at' => '2020-04-22 03:34:10',
                'password' => '$2y$10$9s7ZIVJpQ48mhvl3LTwIfe158Cxv0gA7L0nEDEG12fATdeUjUkw0i',
                'remember_token' => 'xGHn1bPjKD',
                'created_at' => '2020-04-22 03:34:10',
                'updated_at' => '2020-04-22 03:34:10',
            ),
        ));
        
        
    }
}