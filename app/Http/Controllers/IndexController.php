<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{

    public $locale = '';

    const SLIDER_MAIN_CATEGORY = 'Main_page_slider_1';
    const SLIDER_OFFICE_CATEGORY = 'office_slider';
    const BLOCK_2 = 'index_page_block_2';
    const BLOCK_3_TEAM = 'block_3_team';
    const CATEGORY_ABOUT = 'about';
    const CATEGORY_ABOUT_CERTIFICATES = 'certificates';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {


        $cars = Car::get();

        $foo = false;
        return view('cars.index', [
            'data' => Car::all()
        ]);
    }
}