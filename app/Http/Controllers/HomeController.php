<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;
use App\Models\Order;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home', ['orders' => Auth::user()->order()->latest()->get()]);
    }
    // Сделать бронь
    
    public function bookForm(Tour $tour) {
        return view('book', ['tour' => $tour]);
    }
    public function book(Request $request, Tour $tour){
        $id = Auth::user()->id;
        $out_date = Carbon::parse($request->out_date);
        $return_date = $out_date->addDays($tour->nights);
        Order::create(['users_id' => $id, 'tours_id' => $tour->id, 'out_date' => $out_date, 'return_date' => $return_date]);
        return redirect()->route('home');
    }
}
