<?php

namespace App\Http\Controllers;

use App\Models\Dots;
use App\Models\Polygons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PolygonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dots = Dots::get()->toArray();
        $polygons = Polygons::get();

        // Check jsons data
        if(!$polygons){
            $polygons = ['geojson' => ''];
        } else {
            $polygons_array = [];
            // Loop polygons data and push to an array
            foreach($polygons as $polygon){
            $polygons = json_decode(Storage::get('geojsons/'. $polygon['geojson']));
            array_push($polygons_array, $polygons->features);
            }
        }

        return view('polygons.index', [
            'title' => 'Polygons',
            'geojsons'  => $polygons_array,
            'dots'  => $dots
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'geojson' => 'required'
        ]);
        if ($request->file('geojson')) {
            $image = $request->file('geojson')->store('geojsons');
            $path = substr($image, 9);
            Polygons::create(
                ['geojson' => $path]
            );

            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $path);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
