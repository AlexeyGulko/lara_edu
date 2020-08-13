<?php

use App\NewsItem;
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
            factory(Post::class)
                ->create(['owner_id' => $faker->randomElement($users->pluck('id')->all())])
                ->syncTags($randomTags)
            ;
            factory(NewsItem::class)
                ->create(['owner_id' => 1])
                ->syncTags($randomTags)
            ;
        }
    }
}
