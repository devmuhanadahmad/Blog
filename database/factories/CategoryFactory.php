<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->word(2);
        return [
             'name'=>$name,
             'slug'=>Str::slug($name),
             'notes'=>$this->faker->sentence('16'),
             'image'=>$this->faker->imageUrl(600*600),

        ];
    }
}
