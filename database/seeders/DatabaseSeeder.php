<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
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
        User::truncate();
        Category::truncate();
        Blog::truncate();

        $frontend = Category::factory()->create(['name' => 'frontend', 'slug' => 'frontend']);
        $backend = Category::factory()->create(['name' => 'backend', 'slug' => "backend"]);

        $mgmg = User::factory()->create(['name' => 'mgmg', 'username' => 'mgmg']);
        $susu = User::factory()->create(['name' => 'susu', 'username' => 'susu']);

        Blog::factory(2)->create(['category_id' => $frontend->id, 'user_id' => $mgmg->id]);
        Blog::factory(2)->create(['category_id' => $backend->id, 'user_id' => $susu->id]);
    }
}
