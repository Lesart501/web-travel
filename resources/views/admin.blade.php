@extends('layouts.admin_base')

@section('title', 'Редактирование туров')

@section('content')
    <div class="container">
        <a href="{{ route('tour.add') }}" class="btn btn-primary m-5">+ Добавить тур</a>
    </div>

    <div class="container d-flex justify-content-center text-center mb-4">
        <div class="d-grid all_tours">
            @foreach($tours as $tour)
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="storage/uploads/{{$tour->image}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$tour->name}}, {{$tour->country->name}}</h5>
                        <p class="card-text">{{$tour->nights}} ночей, {{$tour->people}} человека</p>
                        <p class="card-text text-primary fs-3">{{$tour->price}} р.</p>
                        <a href="{{ route('tour.edit', ['tour' => $tour->id]) }}" class="btn btn-warning">Редактировать</a>
                        <a href="{{ route('tour.delete', ['tour' => $tour->id]) }}" class="btn btn-danger">Удалить</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection