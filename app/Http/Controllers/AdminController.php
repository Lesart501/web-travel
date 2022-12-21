<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\Country;
use App\Models\Status;

class AdminController extends Controller
{
    private const ADD_VALIDATOR = [
        'name' => 'required|max:255',
        'country' => 'required|numeric',
        'people' => 'required|numeric',
        'nights' => 'required|numeric',
        'image' => 'mimes:jpeg,bmp,png',
        'operators_id' => 'required|numeric',
        'price' => 'required|numeric'
    ];
    private const EDIT_VALIDATOR = [
        'name' => 'required|max:255',
        'country' => 'required|numeric',
        'people' => 'required|numeric',
        'nights' => 'required|numeric',
        'operators_id' => 'required|numeric',
        'price' => 'required|numeric'
    ];

    private const ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'max' => 'Значение не должно быть длиннее :max символов',
        'numeric' => 'Введите число',
        'mimes' => 'Выберите файл формата: jpeg, bmp, png'
    ];

    public function index(){
        $context = ['tours' => Tour::latest()->get()];
        return view('admin', $context);
    }

    public function addTourForm() {
        $context = ['countries' => Country::get()];
        return view('tour_add', $context);
    }
    public function saveTour(Request $request) {
        $validated = $request->validate(self::ADD_VALIDATOR, self::ERROR_MESSAGES);
        $image = $request->file('image');
        $image_name = time()."_". preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));
        $tmp = $image->storeAs('uploads', $image_name, 'public');
        Tour::create(['name' => $validated['name'], 'countries_id' => $validated['country'],'people' => $validated['people'],
        'nights' => $validated['nights'],'image' => $image_name,'operators_id' => $validated['operators_id'],
        'price' => $validated['price']]);
        return redirect()->route('admin');
    }

    public function editTourForm(Tour $tour) {
        $context = ['tour' => $tour, 'countries' => Country::get()];
        return view('tour_edit', $context);
    }
    public function updateTour(Request $request, Tour $tour) {
        if($request->file('image') != ''){
            $this->validate($request, ['image' => ['required', 'mimes:jpeg,gif,bmp,png', 'max:2048']]);
            $image = $request->file('image');
            $image_name = time()."_". preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));
            $tmp = $image->storeAs('uploads', $image_name, 'public');
            $tour->fill(['image' => $image_name]);
        }
        $validated = $request->validate(self::EDIT_VALIDATOR, self::ERROR_MESSAGES);
        $tour->fill(['name' => $validated['name'], 'countries_id' => $validated['country'],'people' => $validated['people'],
        'nights' => $validated['nights'],'operators_id' => $validated['operators_id'],
        'price' => $validated['price']]);
        $tour->save();
        return redirect()->route('admin');
    }

    public function deleteTourForm(Tour $tour) {
        return view('tour_delete', ['tour' => $tour]);
    }
    public function destroyTour(Request $request, Tour $tour) {
        $tour->delete();
        return redirect()->route('admin');
    }
    
    public function orders()
    {
        $context = ['orders' => Order::latest()->get()];
        return view('orders', $context);
    }
    
    public function chStatusForm(Order $order) {
        $context = ['order' => $order, 'statuses' => Status::get()];
        return view('change_status', $context);
    }
    public function saveStatus(Request $request, Order $order) {
        $order->fill(['statuses_id' => $request->status]);
        $order->save();
        return redirect()->route('orders');
    }
}
