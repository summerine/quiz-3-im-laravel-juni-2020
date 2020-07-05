<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('articles')->insert([
            [
                'title' => Str::random(10),
                'content' => Str::random(30),
                'slug' => Str::random(10),
                'tag' => Str::random(20),
            ],
            [
                'title' => Str::random(10),
                'content' => Str::random(30),
                'slug' => Str::random(10),
                'tag' => Str::random(20),
            ]
        ]);
    }
}
