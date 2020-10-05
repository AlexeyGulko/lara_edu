<?php

namespace App\Console\Commands;

use App\Mail\RecentPosts;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NewPostsMailingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailing:post {days}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to all users, with published posts, from now to some days ago';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = $this->argument('days');
        $date = Carbon::now()->subDay($days);
        $posts = Post::where('created_at', '>', $date)
            ->published()
            ->latest()
            ->get();
        Mail::to(User::all())
            ->queue(new RecentPosts($posts, $days));
    }
}
