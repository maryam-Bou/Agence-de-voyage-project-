<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DestinationController extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Destinasi';
        $data['destinations'] = Destination::with(['location'])
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($destination) {
                // Update status based on departure date
                if ($destination->departure_date < now()) {
                    $destination->status = 'past';
                    $destination->save();
                } else {
                    $destination->status = 'upcoming';
                    $destination->save();
                }
                return $destination;
            });
        $data['locations'] = Location::orderBy('name')->get();

        return view('dashboard.destinations.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Destinasi';
        $data['locations'] = Location::orderBy('name')->get();
        return view('dashboard.destinations.create', $data);
    }

    public function show(Destination $destination)
    {
        return view('landing-page.destinations.show', compact('destination'));
    }

    public function edit(Destination $destination)
    {
        $data['title'] = 'Edit Destinasi';
        $data['destination'] = $destination;
        $data['locations'] = Location::orderBy('name')->get();
        return view('dashboard.destinations.edit', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'location_id' => 'required|exists:locations,id',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'departure_date' => 'required|date|after_or_equal:today',
            'duration' => 'required|numeric|min:1',
            'max_guests' => 'required|numeric|min:1',
            'transportation' => 'required|string',
            'accommodation' => 'required|string',
            'meals' => 'required|string',
            'included_services' => 'required|string',
            'highlights' => 'required|string',
            'itinerary' => 'required|string',
        ], [
            'name.required' => 'Tour name is required',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'location_id.required' => 'Location is required',
            'location_id.exists' => 'Selected location does not exist',
            'description.required' => 'Description is required',
            'image.required' => 'Image is required',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'The image may not be greater than 2MB',
            'departure_date.required' => 'Departure date is required',
            'departure_date.date' => 'Departure date must be a valid date',
            'departure_date.after_or_equal' => 'Departure date must be today or later',
            'duration.required' => 'Duration is required',
            'duration.numeric' => 'Duration must be a number',
            'duration.min' => 'Duration must be at least 1 day',
            'max_guests.required' => 'Max guests is required',
            'max_guests.numeric' => 'Max guests must be a number',
            'max_guests.min' => 'Max guests must be at least 1',
            'transportation.required' => 'Transportation is required',
            'accommodation.required' => 'Accommodation is required',
            'meals.required' => 'Meals is required',
            'included_services.required' => 'Included services is required',
            'highlights.required' => 'Highlights is required',
            'itinerary.required' => 'Itinerary is required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Calculate return date based on duration
        $departureDate = \Carbon\Carbon::parse($request->departure_date);
        $returnDate = $departureDate->copy()->addDays($request->duration - 1);

        // Determine status based on departure date
        $status = $departureDate < now() ? 'past' : 'upcoming';

        // if image not null
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            // save to public/images/destination
            $image->move(public_path('images/destination'), $image_name);

            // save to database full url
            $image_name = url('images/destination/') . '/' . $image_name;
        } else {
            $image_name = null;
        }

        $addDestination = Destination::create([
            'name' => $request->name,
            'price' => $request->price,
            'location_id' => $request->location_id,
            'description' => $request->description,
            'image' => $image_name,
            'departure_date' => $departureDate,
            'return_date' => $returnDate,
            'duration' => $request->duration,
            'max_guests' => $request->max_guests,
            'transportation' => $request->transportation,
            'accommodation' => $request->accommodation,
            'meals' => $request->meals,
            'included_services' => $request->included_services,
            'highlights' => $request->highlights,
            'itinerary' => $request->itinerary,
            'status' => $status,
        ]);

        if ($addDestination) {
            return redirect()->back()->with('success', 'Tour package added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add tour package');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'location_id' => 'required|exists:locations,id',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'departure_date' => 'required|date|after_or_equal:today',
            'duration' => 'required|numeric|min:1',
            'max_guests' => 'required|numeric|min:1',
            'transportation' => 'required|string',
            'accommodation' => 'required|string',
            'meals' => 'required|string',
            'included_services' => 'required|string',
            'highlights' => 'required|string',
            'itinerary' => 'required|string',
        ], [
            'name.required' => 'Tour name is required',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'location_id.required' => 'Location is required',
            'location_id.exists' => 'Selected location does not exist',
            'description.required' => 'Description is required',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'The image may not be greater than 2MB',
            'departure_date.required' => 'Departure date is required',
            'departure_date.date' => 'Departure date must be a valid date',
            'departure_date.after_or_equal' => 'Departure date must be today or later',
            'duration.required' => 'Duration is required',
            'duration.numeric' => 'Duration must be a number',
            'duration.min' => 'Duration must be at least 1 day',
            'max_guests.required' => 'Max guests is required',
            'max_guests.numeric' => 'Max guests must be a number',
            'max_guests.min' => 'Max guests must be at least 1',
            'transportation.required' => 'Transportation is required',
            'accommodation.required' => 'Accommodation is required',
            'meals.required' => 'Meals is required',
            'included_services.required' => 'Included services is required',
            'highlights.required' => 'Highlights is required',
            'itinerary.required' => 'Itinerary is required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $destination = Destination::findOrFail($id);
        
        // Calculate return date based on duration
        $departureDate = \Carbon\Carbon::parse($request->departure_date);
        $returnDate = $departureDate->copy()->addDays($request->duration - 1);

        // Determine status based on departure date
        $status = $departureDate < now() ? 'past' : 'upcoming';

        $data = $request->only([
            'name',
            'price',
            'location_id',
            'description',
            'duration',
            'max_guests',
            'transportation',
            'accommodation',
            'meals',
            'included_services',
            'highlights',
            'itinerary'
        ]);

        // Add the calculated dates and status
        $data['departure_date'] = $departureDate;
        $data['return_date'] = $returnDate;
        $data['status'] = $status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            // save to public/images/destination
            $image->move(public_path('images/destination'), $image_name);

            // save to database full url
            $data['image'] = url('images/destination/') . '/' . $image_name;

            // delete old image
            if ($destination->image) {
                $oldImagePath = public_path('images/destination/') . basename($destination->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        try {
            $destination->update($data);
            return redirect()->back()->with('success', 'Tour package updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update tour package: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $destination = Destination::findOrFail($id);
            
            // Delete the image file if it exists
            if ($destination->image) {
                $imagePath = public_path('images/destination/') . basename($destination->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $destination->delete();

            return response()->json(['success' => true, 'message' => 'Tour package deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete tour package: ' . $e->getMessage()], 500);
        }
    }
}
