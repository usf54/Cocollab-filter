<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InfluencerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('influencers')->insert([
            [
                'user_id' => 1, // Ensure this user exists
                'profile_image' => 'profile1.jpg',
                'influencerName' => 'John Doe',
                'influencerDescription' => 'Expert in fitness and lifestyle coaching.',
                'influencerAge' => 28,
                'sexe' => 'Masculin',
                'influencerPlatforms' => json_encode(['Instagram', 'YouTube']),
                'sector_id' => 1, // Ensure this sector exists
                'nbr_abonnes' => 150000, // New column value
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'profile_image' => 'profile2.jpg',
                'influencerName' => 'Jane Smith',
                'influencerDescription' => 'Beauty and fashion influencer.',
                'influencerAge' => 24,
                'sexe' => 'Feminin',
                'influencerPlatforms' => json_encode(['TikTok', 'Facebook']),
                'sector_id' => 2,
                'nbr_abonnes' => 75000, // New column value
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
