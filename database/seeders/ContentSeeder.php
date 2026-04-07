<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;
use App\Models\ContentValue;
use App\Models\User;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::first();
        $adminId = $admin ? $admin->id : 1;

        // Nettoyage pour un déploiement propre (pour éviter les résidus de tests)
        ContentValue::truncate();
        Content::truncate();

        $contents = [
            // HOME - HERO
            ['key' => 'hero_badge', 'type' => 'text', 'value' => 'ARIC SOLUTIONS - EXPERTISE 24/7'],
            ['key' => 'hero_title', 'type' => 'text', 'value' => 'Garantissez la <span class="text-gradient-light">continuité</span> de votre énergie.'],
            ['key' => 'hero_description', 'type' => 'text', 'value' => 'Expertise technique, réactivité immédiate et optimisation énergétique pour vos installations CVC et multitechniques.'],
            ['key' => 'hero_cta_1', 'type' => 'text', 'value' => 'Nos Solutions'],
            ['key' => 'hero_cta_2', 'type' => 'text', 'value' => 'Contacter un expert'],
            ['key' => 'hero_video', 'type' => 'media', 'value' => '/aric-hero.mp4'],
            
            // HOME - ABOUT
            ['key' => 'about_title', 'type' => 'text', 'value' => 'Votre allié pour la performance durable.'],
            ['key' => 'about_description', 'type' => 'text', 'value' => 'Depuis sa création en 1996, ARIC est un acteur majeur du génie climatique et de la réfrigération industrielle en Afrique de l\'Ouest. Filiale du Groupe Conergies.'],
            ['key' => 'about_list_item_1', 'type' => 'text', 'value' => 'Maîtrise technologique avancée'],
            ['key' => 'about_list_item_2', 'type' => 'text', 'value' => 'Accompagnement ISO 50001'],
            ['key' => 'about_list_item_3', 'type' => 'text', 'value' => 'Réactivité et proximité régionale'],
            ['key' => 'about_main_image', 'type' => 'media', 'value' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&q=80&w=800'],
            ['key' => 'about_badge_icon', 'type' => 'icon', 'value' => 'zap'],
            ['key' => 'about_badge_title', 'type' => 'text', 'value' => '<div class="text-2xl font-black text-tech-navy">Efficacité Boostée</div>'],
            
            // EXPERTISE - HEADER
            ['key' => 'expertise_badge', 'type' => 'text', 'value' => 'Notre Expertise'],
            ['key' => 'expertise_title', 'type' => 'text', 'value' => 'Maîtrise des environnements critiques.'],
            
            // SERVICES - CTA
            ['key' => 'services_cta_title', 'type' => 'text', 'value' => 'Besoin d\'un contrat de maintenance ?'],
            ['key' => 'services_cta_desc', 'type' => 'text', 'value' => 'Nos experts sont à votre disposition pour auditer vos installations et vous proposer un plan de maintenance préventive optimisé.'],
            ['key' => 'services_cta_btn_label', 'type' => 'text', 'value' => 'Prendre contact'],
            
            // RECRUTEMENT - HERO
            ['key' => 'rec_hero_badge', 'type' => 'text', 'value' => 'Talents & Carrières'],
            ['key' => 'recruitment_hero_title', 'type' => 'text', 'value' => 'Bâtissons l\'avenir énergétique.'],
            ['key' => 'recruitment_hero_desc', 'type' => 'text', 'value' => 'Rejoignez une équipe d\'experts passionnés et participez aux projets les plus ambitieux de la sous-région.'],
            
            // CONTACT - HEADER
            ['key' => 'contact_section_title', 'type' => 'text', 'value' => 'Prêt à optimiser vos installations ?'],
            ['key' => 'contact_section_desc', 'type' => 'text', 'value' => 'Contactez nos ingénieurs conseil pour une étude personnalisée de vos besoins.'],
        ];

        foreach ($contents as $data) {
            $content = Content::updateOrCreate(
                ['key' => $data['key']],
                ['type' => $data['type'], 'metadata' => []]
            );

            ContentValue::updateOrCreate(
                ['content_id' => $content->id, 'status' => 'published'],
                [
                    'value' => $data['value'],
                    'version_number' => 1,
                    'user_id' => $adminId
                ]
            );
        }
    }
}
