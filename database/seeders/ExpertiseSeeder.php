<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expertise;

class ExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nettoyage pour un déploiement propre
        \App\Models\Expertise::truncate();

        $expertises = [
            [
                'title' => 'Froid Industriel & Commercial',
                'slug' => 'froid-industriel',
                'icon' => 'snowflake',
                'image' => 'froid-expertise.png',
                'description' => 'Conception et maintenance de systèmes frigorifiques pour la grande distribution et l\'industrie.',
                'detail_title' => 'Réfrigération & Conservation Industrielle',
                'detail_description' => 'ARIC Solutions conçoit, installe et maintient des centrales frigorifiques de pointe pour l\'industrie agroalimentaire, les entrepôts logistiques et les plateformes de distribution.',
                'features' => [
                    'Centrales Frigorifiques NH3 / CO2 (Fluides naturels)',
                    'Entrepôts & Chambres Froides haute densité',
                    'Tunnels de congélation et refroidisseurs de process',
                    'Solutions de réfrigération pour la GMS'
                ],
                'order' => 10,
                'is_active' => true,
            ],
            [
                'title' => 'Génie Climatique (CVC)',
                'slug' => 'genie-climatique',
                'icon' => 'wind',
                'image' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=800&auto=format&fit=crop',
                'description' => 'Maîtrise de la température, de l\'hygrométrie et de la qualité de l\'air de vos bâtiments.',
                'detail_title' => 'Génie Climatique & Ventilation',
                'detail_description' => 'Maîtrise de l\'ensemble de la chaîne CVC (Chauffage, Ventilation, Climatisation) pour les complexes tertiaires, bancaires, data centers et hôtels.',
                'features' => [
                    'Climatisation Centrale (VRV/VRF, Groupes d’eau glacée)',
                    'Traitement d\'Air & Ventilation (CTA, Filtration HEPA)',
                    'Désenfumage et sécurité incendie thermique',
                    'Régulation et pilotage GTB'
                ],
                'order' => 20,
                'is_active' => true,
            ],
            [
                'title' => 'Efficacité Énergétique',
                'slug' => 'efficacite-energetique',
                'icon' => 'zap',
                'image' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=800&auto=format&fit=crop',
                'description' => 'Audit, pilotage GTB et optimisation des consommations — accompagnement ISO 50001.',
                'detail_title' => 'Performance & Audit Énergétique',
                'detail_description' => 'Réduisez votre facture énergétique jusqu\'à 30% grâce à nos audits stratégiques et nos solutions de monitoring intelligent.',
                'features' => [
                    'Audits Énergétiques Réglementaires et Volontaires',
                    'Accompagnement à la certification ISO 50001',
                    'Monitoring IoT en temps réel des consommations',
                    'Optimisation des contrats de fourniture d\'énergie'
                ],
                'order' => 30,
                'is_active' => true,
            ],
            [
                'title' => 'Expertise Santé & Pharmaceutique',
                'slug' => 'sante-pharmaceutique',
                'icon' => 'shield-check',
                'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?q=80&w=800&auto=format&fit=crop',
                'description' => 'Maîtrise des environnements ultra-propres et des chaînes de froid critiques.',
                'detail_title' => 'Environnements Critique Santé',
                'detail_description' => 'Solutions spécifiques pour les blocs opératoires, laboratoires et stockage de vaccins nécessitant une précision thermique absolue.',
                'features' => [
                    'Salles Blanches & Environnements Contrôlés (ISO)',
                    'Conservation de produits thermosensibles',
                    'Monitoring continu avec traçabilité totale',
                    'Maintenance préventive ultra-prioritaire'
                ],
                'order' => 40,
                'is_active' => true,
            ],
            [
                'title' => 'Expertise Solaire Photovoltaïque',
                'slug' => 'solaire',
                'icon' => 'sun',
                'image' => 'https://images.unsplash.com/photo-1509391366360-fe5bb58583bb?q=80&w=800&auto=format&fit=crop',
                'description' => 'Hybridation énergétique pour une autonomie durable de vos installations.',
                'detail_title' => 'Autonomie Énergétique Solaire',
                'detail_description' => 'Projets solaires clés en main : de l\'étude de faisabilité à l\'installation de centrales en autoconsommation avec stockage.',
                'features' => [
                    'Audit de gisement solaire et études de rendement',
                    'Installations photovoltaïques en toiture ou au sol',
                    'Systèmes hybrides avec stockage batterie',
                    'Maintenance spécialisée des parcs solaires'
                ],
                'order' => 50,
                'is_active' => true,
            ],
            [
                'title' => 'Maintenance & SAV Connect',
                'slug' => 'maintenance-sav',
                'icon' => 'headset',
                'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800&auto=format&fit=crop',
                'description' => 'Astreinte 24h/24 et assistance technique multitechnique préventive.',
                'detail_title' => 'Assistance & Maintenance 24/7',
                'detail_description' => 'Une équipe de techniciens experts prête à intervenir 24h/24 pour garantir la continuité de vos activités critiques.',
                'features' => [
                    'Contrats de Maintenance Multitechnique sur mesure',
                    'Astreinte technique disponible 24h/24 et 7j/7',
                    'Télégestion et diagnostic à distance via IoT',
                    'Rapports d\'intervention digitaux détaillés'
                ],
                'order' => 60,
                'is_active' => true,
            ],
        ];

        foreach ($expertises as $data) {
            Expertise::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
