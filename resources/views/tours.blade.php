@extends('layouts.base')

@section('title', 'Поиск туров')

@section('content')
    <div class="container my-4 py-4 bg-dark rounded">
        <form class="d-flex justify-content-center filter main_filter text-center text-center" action="{{ route('tour.search') }}" method="GET" id="filter_form">
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
    <section class="text-center mb-5 tours">
        <div class="filters">
            <div class="card d-flex flex-column tour_filter rounded border border-3 border-dark border-top-0">
                <div class="card-header bg-dark text-white rounded-top">Тип отдыха</div>
                <div class="card-body d-flex flex-column text-start">
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
                <div class="card-header bg-dark text-white rounded-top">Размещение</div>
                <div class="card-body d-flex flex-column text-start">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="accommodation" value="0" checked>
                        <label class="form-check-label" for="accommodation">Любое</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="accommodation" value="1">
                        <label class="form-check-label" for="accommodation">Отель</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="accommodation" value="2">
                        <label class="form-check-label" for="accommodation">Хостел</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="accommodation" value="3">
                        <label class="form-check-label" for="accommodation">Вилла</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="accommodation" value="4">
                        <label class="form-check-label" for="accommodation">Бунгало</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="accommodation" value="5">
                        <label class="form-check-label" for="accommodation">Гостевой дом</label>
                    </div>
                </div>
                <div class="card-header bg-dark text-white rounded-top">Питание</div>
                <div class="card-body d-flex flex-column text-start">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="meals" value="0" id="meals1" checked>
                        <label class="form-check-label" for="meals">Любое</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="meals" value="1" id="meals2">
                        <label class="form-check-label" for="meals">Всё включено</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="meals" value="2" id="meals3">
                        <label class="form-check-label" for="meals">Завтрак, обед и ужин</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="meals" value="3" id="meals4">
                        <label class="form-check-label" for="meals">Завтрак и обед</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="meals" value="4" id="meals5">
                        <label class="form-check-label" for="meals">Завтрак</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="meals" value="5" id="meals6">
                        <label class="form-check-label" for="meals">Нет</label>
                    </div>
                </div>
                <div class="card-header bg-dark text-white rounded-top">Цена</div>
                <div class="card-body d-flex align-items-center">
                    <label class="px-1" for="min_price">От</label>
                    <input class="form-control" type="number" name="min_price" id="min_price" value="0">
                    <label class="px-1" for="max_price">до</label>
                    <input class="form-control" type="number" name="max_price" id="max_price" value="999999">
                </div>
                <div class="card-header bg-dark text-white rounded-top">Туроператор</div>
                <div class="card-body d-flex flex-column text-start">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opers" value="0" checked>
                        <label class="form-check-label" for="opers">Любой</label>
                    </div>
                    @foreach ($operators as $operator)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opers" value="{{ $operator->id }}">
                        <label class="form-check-label" for="opers">{{ $operator->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
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
                                    {{-- Поставить регистрацию на туре, а не тут --}}
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
