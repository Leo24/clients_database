<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Car;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('visits.index', [
            'visits' => Visit::all(),
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
        $carId = $request->get('carId');
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
            $visit = Visit::create(($formData));

            return redirect()->route('visit.edit', ['id'=>$visit->id])->with('success', 'Визит успешно создан.');
        }
        $car = Car::find($carId);
        return view('visits.create', ['car' => $car]);
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
    public function edit($id, Request $request)
    {
        if ($request->isMethod('POST')) {
            $formData = $request->all();

//            $validator = $this->validator($request->all());


//            if ($validator->fails() || $formData['country_id'] != $countryId) {
//                // add custom error message to message bag
//                $validator->getMessageBag()->add('error_msg', 'Неверно заполнена форма!');
//                $validator->getMessageBag()->add('city_id', 'City does not exist in selected country');
//
//                return back()->withErrors($validator);
//            }

            $visit = Visit::find($id);
            // update new vacancy with form data

            $visit->update(array_filter($formData));

            return redirect()->route('visit.edit', ['id' => $visit->id])->with('success', 'Визит отредактирован.');
        }

        $data = Visit::find($id);

        return view('visits.edit', [
            'data'               => $data
        ]);
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


    public function carSearch(Request $request)
    {
        $searchParam = $request->get('searchParam');
        $car = Car::where('state_number', 'LIKE', '%' . $searchParam . '%')->get();
        return response()->json($car);
    }
}
