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
    <section class="tours text-center py-5">
        <h3 class="mb-5">Лучшие предложения</h3>
        <div class="container d-flex justify-content-center">
            <div class="row row-cols-3 gap-3 d-flex justify-content-center">
                @foreach($tours as $tour)
                    <div class="card col p-0" style="width: 20rem;">
                        <img class="card-img-top" src="storage/uploads/{{$tour->image}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$tour->name}}, {{$tour->country->name}}</h5>
                            <p class="card-text">{{$tour->nights}} ночей, {{$tour->people}} человека</p>
                            <p class="card-text text-primary fs-3">{{$tour->price}} р.</p>
                            @guest
                            <a href="{{ route('login') }}" class="btn btn-primary">Забронировать</a>
                            @endguest
                            @auth
                            <a href="{{ route('book.form', ['tour' => $tour->id]) }}" class="btn btn-primary">Забронировать</a>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection