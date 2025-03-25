<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Sector;
use App\Models\Collaboration;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        // Check if reset is triggered
        if ($request->has('reset')) {
            return redirect()->route('allbrands'); // Redirect to clear filters
        }

        $brands = Brand::query();

        // Search by brand name
        if ($request->filled('search')) {
            $brands->where('brandName', 'like', '%' . $request->search . '%');
        }

        // Filter by sector
        if ($request->filled('sector')) {
            $brands->where('sector_id', $request->sector);
        }

        // Filter by collaboration type
        if ($request->filled('collaboration')) {
            $brands->where('collaboration_id', $request->collaboration);
        }

        // Filter by size (brandSize is an enum column)
        if ($request->filled('size')) {
            $brands->whereIn('brandSize', $request->size);
        }

        $brands = $brands->get();

        $sectors = Sector::all();
        $collaborations = Collaboration::all();
        
        return view('pages.all-brands', compact('brands', 'sectors', 'collaborations'));
    }
}
