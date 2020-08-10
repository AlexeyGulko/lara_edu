<?php

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
            ->create()
            ->each(function (User $user) use ($faker) {
                $user->posts()->saveMany(factory(Post::class, rand(10, 15))
                    ->make(['owner_id' => '']));
            });

        foreach ($users as $user) {
            $user->posts->each(function (Post $post) use ($tags, $faker) {
                $randomTags = $faker->randomElements(
                    $tags->shuffle()->pluck('name')->all(), rand(1, $tags->count())
                );
                $post->syncTags($randomTags);
            });
        }
    }
}
