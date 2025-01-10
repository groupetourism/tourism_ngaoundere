<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            ['department_id' => 1, 'site_id' => null, 'name' => 'Festival du Nyem-Nyem', 'description' => 'Manifestation touristicoculturelle qui vise à commémorer la victoire du peuple Nyem Nyem sur les colonisateurs allemands à travers l’ascension du Mont Djim et l’exhibition culturelle (danse traditionnelle, sketches, fantasia, exposition d’objets d’art).', 'ticket_price' => 0, 'start_date' => '2024-01-16 10:00:00', 'end_date' => '2024-01-16 18:00:00', 'image' => 'https://fakeimg.pl/300/'],
            ['department_id' => 1, 'site_id' => null, 'name' => 'Festival du Ngondo', 'description' => 'Le Ngondo est la fête traditionnelle et rituelle du Peuple Sawa, peuple côtier camerounais issu de l\'une des quatre aires culturelles du Cameroun.', 'ticket_price' => 1000, 'start_date' => '2024-01-15 10:00:00', 'end_date' => '2024-01-15 18:00:00', 'image' => 'https://fakeimg.pl/300/'],
            ['department_id' => 1, 'site_id' => null, 'name' => 'Festival Mbor-Yanga', 'description' => 'Manifestation touristico-culturelle au cours de laquelle le Bélaka ou Chef Supérieur Mboum entre en communion avec son peuple pour se souvenir de leur passé glorieux en célébrant un culte aux ancêtres Mboum à travers les activités telles que la sortie des objets royaux, la sortie solennelle du Bélaka, les activités culturelles, les excursions, l’exposition d’objets d’art..', 'ticket_price' => 0, 'start_date' => '2024-02-15 10:00:00', 'end_date' => '2024-02-15 18:00:00', 'image' => 'https://fakeimg.pl/300/'],
            ['department_id' => 1, 'site_id' => null, 'name' => 'Miss Ayoba', 'description' => 'Manifestation touristico-culturelle au cours de laquelle le Bélaka ou Chef Supérieur Mboum entre en communion avec son peuple pour se souvenir de leur passé glorieux en célébrant un culte aux ancêtres Mboum à travers les activités telles que la sortie des objets royaux, la sortie solennelle du Bélaka, les activités culturelles, les excursions, l’exposition d’objets d’art..', 'ticket_price' => 0, 'start_date' => '2024-02-15 10:00:00', 'end_date' => '2024-02-15 18:00:00', 'image' => 'https://fakeimg.pl/300/'],
            ['department_id' => 1, 'site_id' => null, 'name' => 'Festival les Repares', 'description' => 'Festival les répares Garoua 4eme édition le 25 Octobre 2024 a NGaoundéré .Danse -concert live-master class-humour-théâtre-échasses-marionnettes géantes-carnaval-ateliers.Thème: Artistes engagés pour un développement durable.', 'ticket_price' => 0, 'start_date' => '2024-02-15 10:00:00', 'end_date' => '2024-02-15 18:00:00', 'image' => 'https://fakeimg.pl/300/'],
            ['department_id' => 1, 'site_id' => null, 'name' => 'La Nuit du Sahel', 'description' => 'Une nuit au cœur du meilleur de la culture sahélienne du grand Nord. La nuit du Sahel est une soirée de Gala qui mettra en lumière le potentiel culturel du grand Nord Cameroun. Avec au programme défilé de mode, musique, comédie,danse traditionnelle et poésie de nombreux artistes de renommée internationale comme Isnebo du Fadaah kwatal seront de la partie.', 'ticket_price' => 1000, 'start_date' => '2024-01-18 10:00:00', 'end_date' => '2024-01-15 19:00:00', 'image' => 'https://fakeimg.pl/300/'],
        ]);
    }
}
