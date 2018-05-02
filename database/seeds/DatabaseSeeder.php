<?php

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(
            [
                'name' => 'sid',
                'email' => 'forge405@gmail.com',
                'role' => 'admin',
                'password' => bcrypt(env('INIT_PASSWD')),
            ]
        );

        //Creare 10 categorie
        $categories = factory(Category::class, 10)->create();
        //Creare 10 utenti
        $users = factory(User::class, 10)->create();
        //Creare 30 tags
        $tags = factory(Tag::class, 30)->create();

        //per ciascun utente creare 15 post
        foreach ($users as $user) {
            //assegnare una categoria random
            $category = $categories->random();
            $posts = factory(Post::class, 15)->create(
                [
                    'category_id' => $category->id,
                    'user_id' => $user->id,
                ]
            );
            //assegnare 3 tags random
            foreach ($posts as $post) {
                $post->tags()->sync($tags->random(3)->pluck('id')->toArray());
            }
        }
    }
}
