<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PopulateDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:fake {users : Number of users to create} {--posts=0 : Set for number of posts to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Fake Data For This Blog';

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
        $this->error('USER FAKER v.01');

        $categories = \App\Category::all();

        $users = factory(\App\User::class, (int) $this->argument('users'))->create();
        $this->info("Created {$users->count()} users");

        if ($this->option('posts')) {
            $this->line("will create {$this->option('posts')} posts per user.");

            foreach ($users as $user) {
                factory(\App\Post::class, (int) $this->option('posts'))->create([
                    'user_id' => $user->id,
                    'category_id' => $categories->random()->id,
                ]);
            }
        }
    }
}
