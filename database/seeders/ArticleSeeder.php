<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nettoyage pour un déploiement propre
        Article::truncate();

        $articles = [
            [
                'title' => 'L\'Innovation au service du Froid Industriel',
                'slug' => 'innovation-froid-industriel',
                'image' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=800&auto=format&fit=crop',
                'summary' => 'Découvrez comment nos nouvelles centrales frigorifiques hybrides permettent une réduction dratique de l\'empreinte carbone.',
                'content' => '<h3>Une révolution pour l’industrie agroalimentaire</h3><p>Face aux défis climatiques, ARIC Solutions déploie une nouvelle génération de centrales frigorifiques utilisant des fluides naturels (NH3/CO2) couplés à des systèmes de stockage d’énergie thermique.</p><p>Ces installations permettent non seulement une conservation optimale des denrées, mais aussi une réduction de 40% des pics de consommation électrique grâce à l’inertie thermique pilotée.</p>',
                'category' => 'Technique',
                'published_at' => Carbon::now()->subDays(5),
                'is_published' => true,
                'order' => 10,
            ],
            [
                'title' => 'Conergies-Group renforce sa présence au Mali',
                'slug' => 'conergies-mali-extension',
                'image' => 'https://images.unsplash.com/photo-1541888946425-d81bb19480c5?q=80&w=800&auto=format&fit=crop',
                'summary' => 'ARIC Mali annonce l\'ouverture de nouveaux bureaux techniques à Bamako pour accompagner les projets miniers.',
                'content' => '<p>Avec une croissance soutenue du secteur minier, ARIC Mali intensifie son accompagnement local avec une équipe dédiée à la maintenance 24/7 sur site.</p>',
                'category' => 'Groupe',
                'published_at' => Carbon::now()->subDays(15),
                'is_published' => true,
                'order' => 20,
            ]
        ];

        foreach ($articles as $data) {
            Article::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
