<?php

namespace Database\Factories;

use App\Models\posts_tags;
use Illuminate\Database\Eloquent\Factories\Factory;

class posts_tagsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = posts_tags::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'tag_id' => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}
