<?php

namespace App\Console\Commands;

use App\Post;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyAdminPostWasUpdated;

class NotifyAdminsOfPostUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:notify-update {post_id : Id of post that was updated}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify Admins of post update';

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
     *
     * @return mixed
     */
    public function handle()
    {
        $post = Post::where('id', $this->argument('post_id'))->firstOrFail();

        $admin = User::where('role', 'admin')->first(); //recipient
        Mail::to($admin)->send(new NotifyAdminPostWasUpdated($post));
    }
}
