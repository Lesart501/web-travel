@extends('layouts.base')

@section('title', 'Поиск туров')

@section('content')
    <div class="container my-4 py-4 bg-dark rounded">
        <form class="d-flex justify-content-center filter main_filter text-center text-center" id="filter_form">
            @csrf
            <label class="text-white mx-2 py-1" for="country">Страна</label>
            <select class="form-select" id="country" name="country" aria-label="Default select example">
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <label class="text-white mx-2 py-1" for="people">Человек</label>
            <input class="form-control" id="people" name="people" type="number" placeholder="Туристов" value="1">
            <label class="text-white mx-2 py-1" for="nights">Ночей</label>
            <input class="form-control" id="nights" name="nights" type="number" placeholder="Ночей" value="6">
            <input class="form-control bg-primary text-white" id="search" type="submit" value="Найти">
        </form>
    </div>
    <section class="row row-cols-2 text-center mb-5">
        <div class="col w-25 h-100 filters">
            <div class="card border-0 d-flex flex-column tour_filter rounded">
                <div class="card-header bg-dark text-white rounded-top">Тип отдыха</div>
                <div class="card-body border border-3 border-dark d-flex flex-column text-start">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="restType" value="0" id="restType1" checked>
                        <label class="form-check-label" for="restType">Любой</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="restType" value="1" id="restType2">
                        <label class="form-check-label" for="restType">Пляжный</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="restType" value="2" id="restType3">
                        <label class="form-check-label" for="restType">Городской</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="restType" value="3" id="restType4">
                        <label class="form-check-label" for="restType">Природный</label>
                    </div>
                </div>
                <div class="card-header bg-dark text-white">Размещение</div>
                <div class="card-body border border-3 border-dark d-flex flex-column text-start">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="accommodation" value="1" id="accommodation1" checked>
                        <label class="form-check-label" for="accommodation">Отель</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="accommodation" value="2" id="accommodation2">
                        <label class="form-check-label" for="accommodation">Хостел</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="accommodation" value="3" id="accommodation3">
                        <label class="form-check-label" for="accommodation">Вилла</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="accommodation" value="4" id="accommodation4">
                        <label class="form-check-label" for="accommodation">Бунгало</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="accommodation" value="5" id="accommodation4">
                        <label class="form-check-label" for="accommodation">Гостевой дом</label>
                    </div>
                </div>
                <div class="card-header bg-dark text-white">Питание</div>
                <div class="card-body border border-3 border-dark d-flex flex-column text-start">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="meals" value="0" id="meals1" checked>
                        <label class="form-check-label" for="meals">Любое</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="meals" value="1" id="meals2">
                        <label class="form-check-label" for="meals">Всё включено</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="meals" value="2" id="meals3">
                        <label class="form-check-label" for="meals">Завтрак, обед и ужин</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="meals" value="3" id="meals4">
                        <label class="form-check-label" for="meals">Завтрак и обед</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="meals" value="4" id="meals5">
                        <label class="form-check-label" for="meals">Завтрак</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="meals" value="5" id="meals6">
                        <label class="form-check-label" for="meals">Нет</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="container d-flex justify-content-center">
                <div class="row row-cols-3 gap-3 d-flex justify-content-center" id="tours">
                    @foreach ($tours as $tour)
                        <div class="card col p-0" style="width: 20rem;">
                            <img class="card-img-top" src="storage/uploads/tours/{{ $tour->image }}">
                            <div class="card-body">
                                <h4 class="card-title mb-3">{{ $tour->name }}</h5>
                                    <h5 class="card-text">{{ $tour->place }}, {{ $tour->country->name }}</h5>
                                    <p class="card-text">{{ $tour->nights }} ночей, {{ $tour->people }} человека</p>
                                    <p class="card-text text-primary fs-3">{{ $tour->price }} р.</p>
                                    @guest
                                        <a href="{{ route('login') }}" class="btn btn-primary">Забронировать</a>
                                    @endguest
                                    @auth
                                        <a href="{{ route('book.form', ['tour' => $tour->id]) }}"
                                            class="btn btn-primary">Забронировать</a>
                                    @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
