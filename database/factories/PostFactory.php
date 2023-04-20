<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->text,
            'likes' => random_int(0, 100),
            'category_id' => Category::get()->random()->id,
            'author' => User::get()->random()->id,

        ];
    }
}
