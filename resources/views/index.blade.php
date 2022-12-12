@extends('layouts.base')

@section('title', 'Главная')

@section('content')
<section class="pic_sec">
    <div class="home_pic">
        <div class="opacity-75 bg-white rounded p-3 pic_text">
            <h2>Добро пожаловать на сайт Travelling</h2>
            <p>Лучшие туры по всему миру у нас!</p>
        </div>
    </div>
</section>
<section class="tours text-center">
    <h3 class="my-5">Лучшие предложения</h3>
    <div class="container">
        <div class="d-grid all_tours">
            @foreach($tours as $tour)
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="img/tours_images/side2.jpeg">
                    <div class="card-body">
                        <h5 class="card-title">{{$tour->name}}, {{$tour->country}}</h5>
                        <p class="card-text">{{$tour->nights}} ночей, {{$tour->people}} человека</p>
                        <p class="card-text text-primary fs-3">{{$tour->price}} р.</p>
                        <a href="#" class="btn btn-primary">Перейти</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection