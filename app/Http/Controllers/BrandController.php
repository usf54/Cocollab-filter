<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Sector;
use App\Models\Collaboration;
use App\Models\Pack;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::query();

        // Search by brand name
        if ($request->has('search') && $request->search != '') {
            $brands->where('brandName', 'like', '%' . $request->search . '%');
        }

        // Filter by sector
        if ($request->has('sector') && $request->sector != '') {
            $brands->where('sector_id', $request->sector);
        }

        // Filter by collaboration type
        if ($request->has('collaboration') && $request->collaboration != '') {
            $brands->where('collaboration_id', $request->collaboration);
        }

        // Filter by size (brandSize is an enum column)
        if ($request->has('size') && !empty($request->size)) {
            $brands->whereIn('brandSize', $request->size);  // Compare directly with 'Petite', 'Moyenne', 'Grande'
        }

        $brands = $brands->get();

        $sectors = Sector::all();
        $collaborations = Collaboration::all();
        
        return view('pages.all-brands', compact('brands', 'sectors', 'collaborations'));
    }

}

