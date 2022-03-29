<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post();
        $post->user_name = 'Jack Seeder';
        $post->title = 'Seeder Title';
        $post->text = 'This post created by Seeder.This post created by Seeder.
                    This post created by Seeder.This post created by Seeder.
                    This post created by Seeder.This post created by Seeder.
                    This post created by Seeder.This post created by Seeder.
                    This post created by Seeder.This post created by Seeder.';
        $post->save();
    }
}
