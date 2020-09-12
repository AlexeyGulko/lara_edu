<?php

use App\Comment;
use App\News;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersWithPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tags = factory(Tag::class, 10)
            ->make();

        $users = factory(User::class, 2)
            ->create();

        Post::unsetEventDispatcher();

        for($i = 1; $i <= 20; $i++) {
            $randomTags = $faker->randomElements(
                $tags->shuffle()->pluck('name')->all(), rand(1, $tags->count())
            );
            $randomUser = $faker->randomElement($users->pluck('id')->all());

            $post = factory(Post::class)
                ->create(['owner_id' => $randomUser])
            ;
            $post->syncTags($randomTags);
            $post
                ->comments()
                ->saveMany(factory(Comment::class, rand(1, 10))
                    ->make([
                        'owner_id' => $randomUser,
                        'commentable_type' => '',
                        'commentable_id' => '',
                    ])
                )
            ;

            $news = factory(News::class)
                ->create(['owner_id' => 1])
            ;
            $news->syncTags($randomTags);
            $news
                ->comments()
                ->saveMany(factory(Comment::class, rand(1, 10))
                    ->make([
                        'owner_id' => $randomUser,
                        'commentable_type' => '',
                        'commentable_id' => '',
                    ])
                );
        }
    }
}
