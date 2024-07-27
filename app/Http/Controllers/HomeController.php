<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tour;
use App\Models\Order;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    private const BOOK_VALIDATOR = [
        'out_date' => 'required|date|after:today',
        'return_date' => 'required|date',
        'phone' => 'required',
    ];

    private const ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'after:today' => 'Отправление должно быть не раньше, чем завтра',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Renderable
    {
        $orders = Order::latest()->where('users_id', Auth::user()->id);

        $context = [
            'orders' => $orders->get(),
            'watched_orders' => $orders->where('statuses_id', 1)->get(),
        ];

        return view('home', $context);
    }

    public function bookForm(Tour $tour): Renderable
    {
        return view('book', ['tour' => $tour]);
    }

    public function book(Request $request, Tour $tour): RedirectResponse
    {
        $validated = $request->validate(self::BOOK_VALIDATOR, self::ERROR_MESSAGES);
        $userId = Auth::user()->id;

        DB::table('users')
            ->where('id', '=', $userId)
            ->update(['phone' => $validated['phone']])
        ;

        Order::create([
            'statuses_id' => 1,
            'users_id' => $userId,
            'tours_id' => $tour->id,
            'out_date' => $validated['out_date'],
            'return_date' => $validated['return_date'],
        ]);

        return redirect()->route('home');
    }

    public function cancelOrder(int $id): Response
    {
        Order::find($id)->delete();

        return response(['success' => true]);
    }
}
