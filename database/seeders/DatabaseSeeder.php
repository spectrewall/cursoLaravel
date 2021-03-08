<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Database\Seeders\PostsTableSeeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(PostsTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(posts_tagsSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
