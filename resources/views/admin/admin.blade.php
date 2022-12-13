@extends('layouts.base')

@section('title', 'Администрирование')

@section('content')
    <a href="{{ route('tour.add') }}" class="nav-link px-2 text-secondary">Главная</a>

    <section class="tours text-center py-5">
        <h3 class="mb-5">Последние туры</h3>
        <div class="container d-flex justify-content-center">
            <div class="d-grid all_tours">
                @foreach($tours as $tour)
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="{{$tour->image}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$tour->name}}, {{$tour->country}}</h5>
                            <p class="card-text">{{$tour->nights}} ночей, {{$tour->people}} человека</p>
                            <p class="card-text text-primary fs-3">{{$tour->price}} р.</p>
                            <!-- Сделать редактирование и удаление -->
                            <a href="{{ route('tour.edit') }}" class="btn btn-primary">Редактировать</a>
                            <a href="{{ route('tour.delete') }}" class="btn btn-primary">Удалить</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection