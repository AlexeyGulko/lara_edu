<?php

use App\Models\Comment;
use App\Models\News;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersWithPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, \App\Service\TagService $sync)
    {
        $tags = Tag::factory()
            ->count(10)
            ->make()
        ;

        $users = User::factory()
            ->count(2)
            ->create()
        ;

        Post::unsetEventDispatcher();

        for($i = 1; $i <= 20; $i++) {
            $randomTags = $faker->randomElements(
                $tags->shuffle()->pluck('name')->all(), rand(1, $tags->count())
            );
            $randomUser = $faker->randomElement($users->pluck('id')->all());

            $post = Post::factory()
                ->create(['owner_id' => $randomUser])
            ;

            $sync->sync($post, $randomTags);

            $post
                ->comments()
                ->saveMany(
                    Comment::factory()
                        ->count( rand(1, 10))
                        ->make([
                            'owner_id' => $randomUser,
                            'commentable_type' => '',
                            'commentable_id' => '',
                        ])
                )
            ;

            $news = News::factory()
                ->create(['owner_id' => 1])
            ;

            $sync->sync($news, $randomTags);

            $news
                ->comments()
                ->saveMany(Comment::factory()
                    ->count( rand(1, 10))
                    ->make([
                        'owner_id' => $randomUser,
                        'commentable_type' => '',
                        'commentable_id' => '',
                    ])
                );
        }
    }
}
