<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Country;
use App\Models\Meal;
use App\Models\Operator;
use App\Models\RestType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Response;

class MainController extends Controller
{
    public function index(): Renderable
    {
        $context = ['tours' => Tour::latest()->get(), 'countries' => Country::get()];

        return view('index', $context);
    }

    public function tours(): Renderable
    {
        $context = [
            'tours' => Tour::latest()->get(), 'countries' => Country::get(), 'operators' => Operator::get(), 'restTypes' => RestType::get(),
            'accomodations' => Accomodation::get(), 'meals' => Meal::get()
        ];

        return view('tours', $context);
    }

    public function tourSearch(Request $request): Renderable
    {
        global $searchRequest;
        $searchRequest = $request;
        $context = [
            'tours' => Tour::where('countries_id', '=', $request->country)->where('people', '=', $request->people)
                ->where('nights', '=', $request->nights)->orderBy('price', 'asc')->get(),
            'countries' => Country::get(), 'operators' => Operator::get(), 'restTypes' => RestType::get(),
            'accomodations' => Accomodation::get(), 'meals' => Meal::get()
        ];

        return view('tours', $context);
    }

    public function filter(Request $request): Response
    {
        if ($request->restType != 0 && $request->accomodation != 0 && $request->meal != 0 && $request->oper != 0) {
            $tours = Tour::where('rest_types_id', '=', $request->restType)->where('accomodations_id', '=', $request->accomodation)
                ->where('meals_id', '=', $request->meal)->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->where('operators_id', '=', $request->oper)->orderBy('price', 'asc')->get();
        } elseif ($request->accomodation != 0 && $request->meal != 0 && $request->oper != 0) {
            $tours = Tour::where('accomodations_id', '=', $request->accomodation)
                ->where('meals_id', '=', $request->meal)->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->where('operators_id', '=', $request->oper)->orderBy('price', 'asc')->get();
        } elseif ($request->meal != 0 && $request->oper != 0) {
            $tours = Tour::where('meals_id', '=', $request->meal)->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->where('operators_id', '=', $request->oper)->orderBy('price', 'asc')->get();
        } elseif ($request->oper != 0) {
            $tours = Tour::where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->where('operators_id', '=', $request->oper)->orderBy('price', 'asc')->get();
        } elseif ($request->restType != 0 && $request->accomodation != 0 && $request->meal != 0) {
            $tours = Tour::where('rest_types_id', '=', $request->restType)->where('accomodations_id', '=', $request->accomodation)
                ->where('meals_id', '=', $request->meal)->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->orderBy('price', 'asc')->get();
        } elseif ($request->restType != 0 && $request->accomodation != 0) {
            $tours = Tour::where('rest_types_id', '=', $request->restType)->where('accomodations_id', '=', $request->accomodation)
                ->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->orderBy('price', 'asc')->get();
        } elseif ($request->restType != 0) {
            $tours = Tour::where('rest_types_id', '=', $request->restType)
                ->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->orderBy('price', 'asc')->get();
        } elseif ($request->restType != 0 && $request->meal != 0 && $request->oper != 0) {
            $tours = Tour::where('rest_types_id', '=', $request->restType)
                ->where('meals_id', '=', $request->meal)->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->where('operators_id', '=', $request->oper)->orderBy('price', 'asc')->get();
        } elseif ($request->meal != 0 && $request->oper != 0) {
            $tours = Tour::where('meals_id', '=', $request->meal)->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->where('operators_id', '=', $request->oper)->orderBy('price', 'asc')->get();
        } elseif ($request->meal != 0) {
            $tours = Tour::where('meals_id', '=', $request->meal)->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->orderBy('price', 'asc')->get();
        } elseif ($request->restType != 0 && $request->oper != 0) {
            $tours = Tour::where('rest_types_id', '=', $request->restType)
                ->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->where('operators_id', '=', $request->oper)->orderBy('price', 'asc')->get();
        } elseif ($request->restType != 0 && $request->accomodation != 0 && $request->oper != 0) {
            $tours = Tour::where('rest_types_id', '=', $request->restType)->where('accomodations_id', '=', $request->accomodation)
                ->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->where('operators_id', '=', $request->oper)->orderBy('price', 'asc')->get();
        } elseif ($request->accomodation != 0 && $request->oper != 0) {
            $tours = Tour::where('accomodations_id', '=', $request->accomodation)
                ->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->where('operators_id', '=', $request->oper)->orderBy('price', 'asc')->get();
        } elseif ($request->accomodation != 0) {
            $tours = Tour::where('accomodations_id', '=', $request->accomodation)
                ->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->orderBy('price', 'asc')->get();
        } else {
            $tours = Tour::where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)
                ->orderBy('price', 'asc')->get();
        }
        $output = '';
        foreach ($tours as $tour) {
            $output .= "<div class=\"card col p-0\" style=\"width: 20rem;\">
                <img class=" . "card-img-top" . " src=" . "storage/uploads/tours/" . $tour->image . ">
                <div class=" . "card-body" . ">
                    <h4 class=\"card-title mb-3\">" . $tour->name . "</h5>
                    <h5 class=" . "card-text" . ">" . $tour->place . ", " . $tour->country->name . "</h5>
                    <p class=" . "card-text" . ">" . $tour->nights . " ночей, " . $tour->people . " человека</p>
                    <p class=\"card-text text-primary fs-3\">" . $tour->price . " р.</p>
                    <a href=\"/home/" . $tour->id . "/book\" class=\"btn btn-primary\">Забронировать</a>
                </div>
            </div>";
        }

        return response($output);
    }

    public function about(): Renderable
    {
        return view('about');
    }
}
