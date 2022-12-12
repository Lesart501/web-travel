<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class MainController extends Controller
{
    public function index(){
        $context = ['tours' => Tour::latest()->get()];
        return view('index', $context);
    }
}
