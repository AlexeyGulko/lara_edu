<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->sentence,
            'body'          => $this->faker->paragraph,
            'description'   => $this->faker->sentence,
            'published'     => $this->faker->boolean,
            'slug'          => $this->faker->unique()->slug,
            'owner_id'      => User::factory()->create(),
        ];
    }
}
