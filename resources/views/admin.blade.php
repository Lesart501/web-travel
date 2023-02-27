@extends('layouts.base')

@section('title', 'Редактирование туров')

@section('content')
    <div class="container">
        <a href="{{ route('tour.add') }}" class="btn btn-primary m-5">+ Добавить тур</a>
    </div>

    <section class="tours text-center mb-5">
        <div class="container d-flex justify-content-center">
            <div class="row row-cols-3 gap-3 d-flex justify-content-center">
                @foreach($tours as $tour)
                    <div class="card col p-0" style="width: 20rem;">
                        <img class="card-img-top" src="storage/uploads/tours/{{$tour->image}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$tour->name}}, {{$tour->country->name}}</h5>
                            <p class="card-text">{{$tour->nights}} ночей, {{$tour->people}} человека</p>
                            <p class="card-text text-secondary">От {{$tour->operator->name}}</p>
                            <p class="card-text text-primary fs-3">{{$tour->price}} р.</p>
                            <a href="{{ route('tour.edit', ['tour' => $tour->id]) }}" class="btn btn-warning">Редактировать</a>
                            <a href="{{ route('tour.delete', ['tour' => $tour->id]) }}" class="btn btn-danger">Удалить</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection