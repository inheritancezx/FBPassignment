<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Category::create([
            'name' => 'aretia, navarre',
            'slug' => "aretia-navarre",
            'color' => 'orange'
        ]);

        Category::create([
            'name' => 'velaris, phyrrian',
            'slug' => "velaris-phyrrian",
            'color' => "purple"
        ]);

        Category::create([
            'name' => 'soberone, shifters',
            'slug' => "soberone-shifters",
            'color' => 'yellow'
        ]);

        Category::create([
            'name' => 'void, the aurora',
            'slug' => "void-the-aurora",
            'color' => 'teal'
        ]);
    }
}
