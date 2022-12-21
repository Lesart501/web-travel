<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;
use App\Models\Order;
use Carbon\Carbon;

class HomeController extends Controller
{
    private const BOOK_VALIDATOR = ['out_date' => 'required|date'];
    private const ERROR_MESSAGES = ['required' => 'Заполните это поле'];
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
        $context = ['orders' => Order::latest()->where('users_id', Auth::user()->id)->get()];
        return view('home', $context);
    }
    
    public function bookForm(Tour $tour) {
        return view('book', ['tour' => $tour]);
    }
    public function book(Request $request, Tour $tour){
        $validated = $request->validate(self::BOOK_VALIDATOR, self::ERROR_MESSAGES);
        $id = Auth::user()->id;
        $out_date = Carbon::parse($request->out_date);
        $return_date = $out_date->addDays($tour->nights);
        Order::create(['statuses_id' => 1, 'users_id' => $id, 'tours_id' => $tour->id, 'out_date' => $validated['out_date'], 'return_date' => $return_date]);
        return redirect()->route('home');
    }
}
