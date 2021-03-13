<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  \App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();
        Tag::factory()->count(100)->create();
    }
}
