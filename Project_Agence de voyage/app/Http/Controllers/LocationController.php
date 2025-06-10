<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Lokasi';
        $data['locations'] = Location::orderByDesc('created_at')->get();

        return view('dashboard.locations.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location'  => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'location.required' => 'Location is required',
            'image.image' => 'File must be an image',
            'image.mimes' => 'File must be an image with format jpeg, png, or jpg',
            'image.max' => 'File size must not exceed 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        // if image not null
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            // save to public/images/locations
            $image->move(public_path('images/locations'), $image_name);

            // save to database full url
            $image_name = url('images/locations/') . '/' . $image_name;
        } else {
            $image_name = null;
        }

        $addLocation = Location::insert([
            'name' => $request->location,
            'description' => $request->description,
            'image' => $image_name,
        ]);

        if ($addLocation) {
            return redirect()->back()->with('success', 'Location added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add location');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'location'  => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'location.required' => 'Location is required',
            'image.image' => 'File must be an image',
            'image.mimes' => 'File must be an image with format jpeg, png, or jpg',
            'image.max' => 'File size must not exceed 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $dataUpdate = [
            'name' => $request->location,
            'description' => $request->description,
        ];

        // if image not null
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            // save to public/images/locations
            $image->move(public_path('images/locations'), $image_name);

            // save to database full url
            $image_name = url('images/locations/') . '/' . $image_name;

            $dataUpdate['image'] = $image_name;
        }

        $updateLocation = Location::where('id', base64_decode($id))->update($dataUpdate);

        if ($updateLocation) {
            return redirect()->back()->with('success', 'Location updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update location');
        }
    }

    public function destroy($id)
    {
        $location = Location::find(base64_decode($id));
        if (!$location) {
            return redirect()->back()->with('error', 'Location not found');
        }

        // Delete image if exists
        if ($location->image) {
            $imagePath = public_path('images/locations/') . basename($location->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $location->delete();

        return redirect()->back()->with('success', 'Location deleted successfully');
    }
}
