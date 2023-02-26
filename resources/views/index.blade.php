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

<section class="slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="tours text-center pb-5">
    <div class="mb-4 py-4 bg-dark">
        <h3 class="text-white mb-4">Выберите подходящий Вам тур</h3>
        <div class="container d-flex justify-content-center">
            <select class="form-select" id="country" name="country" aria-label="Default select example">
                @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <input class="form-control" id="people" type="number" placeholder="Туристов" value="1">
            <input class="form-control" id="nights" type="number" placeholder="Ночей" value="6">
            <input class="form-control bg-primary text-white" id="search" type="button" value="Найти">
        </div>
    </div>
    <div class="container d-flex justify-content-center flex-column">
        <div class="row row-cols-3 gap-3 d-flex justify-content-center" id="tours">
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