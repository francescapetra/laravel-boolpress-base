<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Comment;
use App\Post;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //select dei post pubblicati
        $posts = Post::where('published',1)->get();
        //ciclo sui posts
        foreach ($posts as $post) {
        //ciclo n volte per creare i commenti
        for ($i=0; $i < rand(0, 3); $i++) { 
            
            $newComment = new comment();
            $newComment->post_id = $post->id;
            $newComment->name = $faker->name();            
            $newComment->content = $faker->text();

            $newComment->save();
        }
        }

        
    }
}
