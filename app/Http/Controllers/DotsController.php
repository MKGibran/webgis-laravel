<?php

namespace App\Http\Controllers;

use App\Models\Dots;
use Illuminate\Http\Request;

class DotsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dots = Dots::get()->toArray();
        return view('dots.index', [
            'title' => 'Dots',
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
        Dots::create([
            'place' => $request->place,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        return redirect()->back();
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
