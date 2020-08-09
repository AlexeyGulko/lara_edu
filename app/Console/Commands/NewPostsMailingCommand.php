<?php

namespace App\Console\Commands;

use App\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NewPostsMailingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailing:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to all users, with published posts, from now to some days ago';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = $this->ask('Days ');
        $date = Carbon::now()->subDay($days);
        $posts = Post::where('created_at', '>', $date)
            ->published()
            ->latest()
            ->get();
    }
}
