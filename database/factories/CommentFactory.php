<?php

namespace Database\Factories;

use App\Interfaces\CanBeCommented;
use App\Models\Comment;
use App\Models\User;
use App\Models\News;
use App\Models\Post;
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
     * @var CanBeCommented[]
     */
    protected $commentable = [
        Post::class,
        News::class,
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $commentableType = $this->faker->randomElement($this->commentable);
        return [
            'body' => $this->faker->sentence,
            'owner_id' => User::factory()->create(),
            'commentable_type' => $commentableType,
            'commentable_id' => $commentableType::factory()->make()->id,
        ];
    }
}
