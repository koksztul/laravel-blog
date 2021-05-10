<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::factory(30)->create();

        $tags = \App\Models\Tag::all();

        \App\Models\Post::all()->each(function ($post) use ($tags) {
            $post->tags()->sync(
                $tags->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
