<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(\LaraDev\Post::class, 20)->create();
        \LaraDev\Models\Post::factory(10)->create();
    }
}
