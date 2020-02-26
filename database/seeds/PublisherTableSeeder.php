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
        factory(Publisher::class, 30)->create();
    }
}
