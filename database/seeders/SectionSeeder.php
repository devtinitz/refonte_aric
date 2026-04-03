<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            // Welcome
            ['page' => 'welcome', 'key' => 'hero', 'name' => 'Hero Section', 'order' => 10],
            ['page' => 'welcome', 'key' => 'about', 'name' => 'Qui sommes-nous', 'order' => 20],
            ['page' => 'welcome', 'key' => 'services', 'name' => 'Nos Services', 'order' => 30],
            ['page' => 'welcome', 'key' => 'expertise', 'name' => 'Notre Expertise', 'order' => 40],
            ['page' => 'welcome', 'key' => 'testimonials', 'name' => 'Références / Témoignages', 'order' => 50],
            ['page' => 'welcome', 'key' => 'contact', 'name' => 'Contact', 'order' => 60],
            
            // About
            ['page' => 'about', 'key' => 'hero', 'name' => 'Hero Banner', 'order' => 10],
            ['page' => 'about', 'key' => 'history', 'name' => 'Notre Histoire', 'order' => 20],
            ['page' => 'about', 'key' => 'mission', 'name' => 'Notre Mission', 'order' => 30],
            ['page' => 'about', 'key' => 'governance', 'name' => 'Gouvernance', 'order' => 40],
            ['page' => 'about', 'key' => 'presence', 'name' => 'Présence Régionale', 'order' => 50],
            ['page' => 'about', 'key' => 'impact', 'name' => 'Impact Environnemental', 'order' => 60],
            ['page' => 'about', 'key' => 'certifications', 'name' => 'Certifications', 'order' => 70],

            // Services
            ['page' => 'services', 'key' => 'hero', 'name' => 'Hero Banner', 'order' => 10],
            ['page' => 'services', 'key' => 'offers', 'name' => 'Nos Offres', 'order' => 20],
            ['page' => 'services', 'key' => 'engagements', 'name' => 'Nos Engagements', 'order' => 30],
            ['page' => 'services', 'key' => 'cta', 'name' => 'Appel à l\'action', 'order' => 40],

            // Expertise
            ['page' => 'expertise', 'key' => 'hero', 'name' => 'Hero Banner', 'order' => 10],
            ['page' => 'expertise', 'key' => 'domains', 'name' => 'Nos Domaines', 'order' => 20],

            // Expertise Industrie
            ['page' => 'expertise-industrie', 'key' => 'hero', 'name' => 'Hero Banner', 'order' => 10],
            ['page' => 'expertise-industrie', 'key' => 'content', 'name' => 'Contenu Principal', 'order' => 20],

            // Expertise Tertiaire
            ['page' => 'expertise-tertiaire', 'key' => 'hero', 'name' => 'Hero Banner', 'order' => 10],
            ['page' => 'expertise-tertiaire', 'key' => 'content', 'name' => 'Contenu Principal', 'order' => 20],

            // Expertise Efficacité
            ['page' => 'expertise-efficacite', 'key' => 'hero', 'name' => 'Hero Banner', 'order' => 10],
            ['page' => 'expertise-efficacite', 'key' => 'content', 'name' => 'Contenu Principal', 'order' => 20],

            // Expertise Santé
            ['page' => 'expertise-sante', 'key' => 'hero', 'name' => 'Hero Banner', 'order' => 10],
            ['page' => 'expertise-sante', 'key' => 'content', 'name' => 'Contenu Principal', 'order' => 20],

            // Expertise Solaire
            ['page' => 'expertise-solaire', 'key' => 'hero', 'name' => 'Hero Banner', 'order' => 10],
            ['page' => 'expertise-solaire', 'key' => 'content', 'name' => 'Contenu Principal', 'order' => 20],

            // Actualités
            ['page' => 'actualites', 'key' => 'hero', 'name' => 'Hero Banner', 'order' => 10],
            ['page' => 'actualites', 'key' => 'grid', 'name' => 'Grille d\'actualités', 'order' => 20],
            ['page' => 'actualites', 'key' => 'newsletter', 'name' => 'Newsletter', 'order' => 30],

            // Recrutement
            ['page' => 'recrutement', 'key' => 'hero', 'name' => 'Hero Banner', 'order' => 10],
            ['page' => 'recrutement', 'key' => 'why-us', 'name' => 'Pourquoi ARIC ?', 'order' => 20],
            ['page' => 'recrutement', 'key' => 'jobs', 'name' => 'Postes à pourvoir', 'order' => 30],
            ['page' => 'recrutement', 'key' => 'spontaneous', 'name' => 'Candidature Spontanée', 'order' => 40],

            // Contact
            ['page' => 'contact', 'key' => 'hero', 'name' => 'Hero Banner', 'order' => 10],
            ['page' => 'contact', 'key' => 'cards', 'name' => 'Cartes de contact', 'order' => 20],
            ['page' => 'contact', 'key' => 'offices', 'name' => 'Bureaux & Formulaire', 'order' => 30],
        ];

        foreach ($sections as $section) {
            \App\Models\Section::updateOrCreate(
                ['page' => $section['page'], 'key' => $section['key']], 
                $section
            );
        }
    }
}
