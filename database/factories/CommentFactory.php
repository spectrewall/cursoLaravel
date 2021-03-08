<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'post_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'comment' => $this->faker->sentence,
            'name' => $this->faker->name,
            'email' => $this->faker->email,

        ];
    }
}
