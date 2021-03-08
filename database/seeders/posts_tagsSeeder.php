<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\posts_tags;

class posts_tagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        posts_tags::truncate();
        posts_tags::factory()->count(10)->create();
    }
}
