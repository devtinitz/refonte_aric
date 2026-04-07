<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,      // Admin first
            SectionSeeder::class,   // Layout structure
            ContentSeeder::class,   // CMS texts
            ExpertiseSeeder::class, // Real expertise items
            ArticleSeeder::class,   // Real news
            JobSeeder::class,       // Real jobs
        ]);
    }
}
