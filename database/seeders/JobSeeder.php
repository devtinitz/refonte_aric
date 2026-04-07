<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobOffer;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nettoyage pour un déploiement propre
        JobOffer::truncate();

        $jobs = [
            [
                'title' => 'Expert Froid Industriel (H/F)',
                'category' => 'Technique / CVC',
                'contract_type' => 'CDI',
                'experience' => '5-10 ans',
                'location' => 'Abidjan, Côte d\'Ivoire',
                'tags' => ['Froid Industriel', 'Senior', 'Régional'],
                'icon' => 'snow-flake', // Added Snowflake icon placeholder
                'is_active' => true,
                'order' => 10,
            ],
            [
                'title' => 'Technicien Maintenance CVC (H/F)',
                'category' => 'Maintenance / SAV',
                'contract_type' => 'CDI',
                'experience' => '2-5 ans',
                'location' => 'Bamako, Mali',
                'tags' => ['CVC', '24h/7', 'Terrain'],
                'icon' => 'settings',
                'is_active' => true,
                'order' => 20,
            ]
        ];

        foreach ($jobs as $data) {
            // Convert tags to JSON if necessary (depends on migration)
            JobOffer::updateOrCreate(['title' => $data['title']], $data);
        }
    }
}
