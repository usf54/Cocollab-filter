<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\User;
use App\Models\Pack;
use App\Models\Collaboration;
use App\Models\Sector;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve random IDs for foreign keys
        $userIds = User::pluck('id')->toArray();
        $packIds = Pack::pluck('id')->toArray();
        $collaborationIds = Collaboration::pluck('id')->toArray();
        $sectorIds = Sector::pluck('id')->toArray();

        // Check if there are users, packs, collaborations, and sectors before seeding
        if (empty($userIds) || empty($packIds) || empty($collaborationIds) || empty($sectorIds)) {
            return;
        }

        // Seed 10 brands
        for ($i = 0; $i < 10; $i++) {
            Brand::create([
                'user_id' => $userIds[array_rand($userIds)],
                'logo_image' => 'logos/logo' . ($i + 1) . '.png', // Example path
                'brandName' => 'Brand ' . ($i + 1),
                'brandSize' => ['Petite', 'Moyenne', 'Grande'][array_rand(['Petite', 'Moyenne', 'Grande'])],
                'brandDescription' => 'This is a description for Brand ' . ($i + 1),
                'brandLocalisation' => 'City ' . ($i + 1),
                'pack_id' => $packIds[array_rand($packIds)],
                'collaboration_id' => $collaborationIds[array_rand($collaborationIds)],
                'sector_id' => $sectorIds[array_rand($sectorIds)],
            ]);
        }
    }
}

