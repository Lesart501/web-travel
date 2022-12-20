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
    public function index(){
        $context = ['tours' => Tour::latest()->get()];
        return view('admin', $context);
    }

    public function addTourForm() {
        $context = ['countries' => Country::get()];
        return view('tour_add', $context);
    }
    public function saveTour(Request $request) {
        $this->validate($request, ['image' => ['required', 'mimes:jpeg,gif,bmp,png', 'max:2048']]);
        $image = $request->file('image');
        $image_name = time()."_". preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));
        $tmp = $image->storeAs('uploads', $image_name, 'public');
        Tour::create(['name' => $request->name, 'country' => $request->country,'people' => $request->people,
        'nights' => $request->nights,'image' => $image_name,'operators_id' => $request->operators_id,
        'price' => $request->price]);
        return redirect()->route('admin');
    }

    public function editTourForm(Tour $tour) {
        $context = ['tour' => $tour, 'countries' => Country::get()];
        return view('tour_edit', $context);
    }
    public function updateTour(Request $request, Tour $tour) {
        $this->validate($request, ['image' => ['required', 'mimes:jpeg,gif,bmp,png', 'max:2048']]);
        $image = $request->file('image');
        $image_name = time()."_". preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));
        $tmp = $image->storeAs('uploads', $image_name, 'public');
        $tour->fill(['name' => $request->name, 'country' => $request->country,
        'people' => $request->people,'nights' => $request->nights,'image' => $image_name,
        'operators_id' => $request->operators_id,'price' => $request->price]);
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
        $order->fill(['status' => $request->status]);
        $order->save();
        return redirect()->route('orders');
    }
}
