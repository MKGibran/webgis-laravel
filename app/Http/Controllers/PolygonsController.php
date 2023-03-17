<?php

namespace App\Http\Controllers;

use App\Models\Polygons;
use Illuminate\Http\Request;

class PolygonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polygons = Polygons::get()->toArray();
        return view('polygons.index', [
            'title' => 'Polygons',
            'polygons'  => $polygons
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
        //
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
