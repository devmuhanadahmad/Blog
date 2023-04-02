<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->word(20);
        return [
             //'user_id'=>User::inRandomOrder()->first()->id,
             //'category_id'=>Category::inRandomOrder()->first()->id,
             'title'=>$name,
             'smallDes'=>$this->faker->sentence('50'),
             'content'=>$this->faker->sentence('355'),
             'image'=>$this->faker->imageUrl(600*600),

        ];
    }
}
