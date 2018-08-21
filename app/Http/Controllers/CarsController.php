<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cars.index', [
            'cars' => Car::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\name  $name
     * @return \Illuminate\Http\Response
     */
    public function show(name $name)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\name  $name
     * @return \Illuminate\Http\Response
     */
    public function edit(name $name)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\name  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, name $name)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy(name $name)
    {
        //
    }
}
