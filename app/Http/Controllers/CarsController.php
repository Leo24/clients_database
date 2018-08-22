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

    public function create(Request $request, array $params = null)
    {
        $formData = $request->all();

        if ($request->isMethod('POST')) {

//            $validator = $this->validator($request->all());
//
//            if ($validator->fails()) {
//                // add custom error message to message bag
//                $validator->getMessageBag()->add('error_msg', 'Неверно заполнена форма!');
//                $validator->getMessageBag()->add('city_id', 'City does not exist in selected country');
//                return redirect('/panel/vacancies/create')
//                    ->withErrors($validator)
//                    ->withInput($request->all());
//            }




            // create new vacancy with form data
            $car = Car::create(($formData));

            return redirect()->route('cars.index')->with('success', 'Автомобиль успешно создан.');
        }
        
        $car = [];
        return view('cars.create', $car);
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
