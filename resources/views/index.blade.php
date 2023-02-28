@extends('layouts.base')

@section('title', 'Главная')

@section('content')
<section class="pic_sec">
    <div class="home_pic">
        <div class="opacity-75 bg-white rounded p-3 pic_text">
            <h1>Добро пожаловать на сайт Travelling</h1>
            <h4 class="mt-3">Лучшие туры по всему миру у нас!</h4>
        </div>
    </div>
</section>

<section class="slider text-center">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="storage/uploads/slider/slider_alps.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Доломитовые Апьпы</h5>
                    <p>Италия</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="storage/uploads/slider/slider_beach.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Сиамский залив</h5>
                    <p>Тайланд</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="storage/uploads/slider/slider_canyon.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Гранд-каньон</h5>
                    <p>США</p>
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
        <form class="container d-flex justify-content-center filter text-center" id="filter_form">
            @csrf
            <label class="fs-5 text-white mx-2 py-1" for="country">Страна</label>
            <select class="form-select" id="country" name="country" aria-label="Default select example">
                @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <label class="fs-5 text-white mx-2 py-1" for="people">Человек</label>
            <input class="form-control" id="people" name="people" type="number" placeholder="Туристов" value="1">
            <label class="fs-5 text-white mx-2 py-1" for="nights">Ночей</label>
            <input class="form-control" id="nights" name="nights" type="number" placeholder="Ночей" value="6">
            <input class="form-control bg-primary text-white fs-5" id="search" type="submit" value="Найти">
        </form>
    </div>
    <div class="container d-flex justify-content-center flex-column">
        <div class="row row-cols-3 gap-3 d-flex justify-content-center" id="tours">
            <!-- Сделать middleware для гостя для фильтра -->
            @foreach($tours as $tour)
            <div class="card col p-0" style="width: 20rem;">
                <img class="card-img-top" src="storage/uploads/tours/{{$tour->image}}">
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