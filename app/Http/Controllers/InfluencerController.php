<?php

namespace App\Http\Controllers;

use App\Models\Influencer;
use App\Models\Sector;
use Illuminate\Http\Request;

class InfluencerController extends Controller
{
    public function index(Request $request)
    {
        // Check if reset is triggered
        if ($request->has('reset')) {
            return redirect()->route('allinfluencers'); // Redirect to clear filters
        }

        $query = Influencer::query();

        // Filter by name
        if ($request->filled('search')) {
            $query->where('influencerName', 'like', '%' . $request->search . '%');
        }

        // Filter by sector
        if ($request->filled('sector')) {
            $query->where('sector_id', $request->sector);
        }

        // Filter by gender
        if ($request->filled('gender')) {
            $query->whereIn('sexe', $request->gender);
        }

        // Filter by number of followers
        if ($request->filled('nbr_abonnes')) {
            $ranges = [
                '50000' => [0, 49999],          // 0 - 50K
                '100000' => [50000, 99999],     // 50K - 100K
                '500000' => [100000, 499999],   // 100K - 500K
                '1000000' => [500000, 999999],  // 500K - 1M
                '1000001' => [1000000, null],   // 1M+
            ];

            $query->where(function ($q) use ($request, $ranges) {
                foreach ($request->nbr_abonnes as $value) {
                    if (isset($ranges[$value])) {
                        if ($ranges[$value][1] !== null) {
                            $q->orWhereBetween('nbr_abonnes', $ranges[$value]);
                        } else {
                            $q->orWhere('nbr_abonnes', '>=', $ranges[$value][0]);
                        }
                    }
                }
            });
        }

        $influencers = $query->paginate(8);
        $sectors = Sector::all();

        return view('pages.all-influencers', compact('influencers', 'sectors'));
    }
}
