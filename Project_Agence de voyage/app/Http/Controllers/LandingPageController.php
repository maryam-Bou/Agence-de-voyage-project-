<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $query = Destination::with('location')
            ->where('departure_date', '>', now())
            ->orderBy('departure_date');

        // Search by destination name
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by departure date
        if ($request->has('departure_date') && $request->departure_date != '') {
            $query->whereDate('departure_date', '>=', $request->departure_date);
        }

        // Filter by return date
        if ($request->has('return_date') && $request->return_date != '') {
            $query->whereDate('return_date', '<=', $request->return_date);
        }

        // Filter by max price
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }

        $destinations = $query->get();
        return view('landing-page.index', compact('destinations'));
    }

    public function destinations(Request $request)
    {
        $data['title'] = 'Destinations';
        $data['locations'] = \App\Models\Location::all();
        
        $query = Destination::with(['location'])
            ->where('departure_date', '>', now())
            ->orderBy('departure_date');

        // Apply location filter if selected
        if ($request->has('location_id') && $request->location_id != '') {
            $query->where('location_id', $request->location_id);
        }

        $data['destinations'] = $query->get();
        return view('landing-page.destinations.index', $data);
    }

    public function showDestination(Destination $destination)
    {
        return view('landing-page.destinations.show', compact('destination'));
    }

    public function about()
    {
        return view('landing-page.about.index');
    }

    public function contact()
    {
        return view('landing-page.contact.index');
    }
}
