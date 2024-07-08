<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tour;
use App\Models\Order;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    private const BOOK_VALIDATOR = [
        'out_date' => 'required|date|after:today',
        'return_date' => 'required|date',
        'phone' => 'required'
    ];

    private const ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'after:today' => 'Отправление должно быть не раньше, чем завтра'
    ];

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index(): Renderable
    {
        $orders = Order::latest()->where('users_id', Auth::user()->id);
        $context = [
            'orders' => $orders->get(),
            'watched_orders' => $orders->where('statuses_id', 1)->get()
        ];

        return view('home', $context);
    }

    public function bookForm(Tour $tour) {
        return view('book', ['tour' => $tour]);
    }

    public function book(Request $request, Tour $tour){
        $validated = $request->validate(self::BOOK_VALIDATOR, self::ERROR_MESSAGES);
        $id = Auth::user()->id;
        DB::table('users')->where('id', '=', Auth::user()->id)->update(['phone' => $validated['phone']]);
        Order::create([
            'statuses_id' => 1,
            'users_id' => $id,
            'tours_id' => $tour->id,
            'out_date' => $validated['out_date'],
            'return_date' => $validated['return_date']
        ]);

        return redirect()->route('home');
    }

    public function cancelOrder($id){
        $order = Order::find($id);
        $order->delete();

        return response(['success' => 'Order has been cancelled']);
    }
}
