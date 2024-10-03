<?php

namespace Database\Seeders;

use App\Models\post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call([categorySeeder::class, userSeeder::class]);
        post::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
