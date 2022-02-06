<?php

use Faker\Factory;
use LaraDev\Models\Post;

class PostFactory extends Factory{
    protected $model = Post::class;
    public function definition(){

        return [

            'title' => $this->faker->sentence(8),
         'subtitle' => $this->faker->sentence(16),
         'description' => $this->faker->paragraph(10)

        ];
    }
}






// use Faker\Generator as Faker;

// $factory->define(\LaraDev\Models\Post::class, function (Faker $faker) {

//     return [
//         'title' => $faker->sentence(8),
//         'subtitle' => $faker->sentence(16),
//         'description' => $faker->paragraph(10)
//     ];

// });
