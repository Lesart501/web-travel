@extends('layouts.admin_base')

@section('title', 'Удалить тур')

@section('content')
    <div class="container d-flex justify-content-center text-center">
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="{{$tour->image}}">
            <div class="card-body">
                <h5 class="card-title">{{$tour->name}}, {{$tour->country}}</h5>
                <p class="card-text">{{$tour->nights}} ночей, {{$tour->people}} человека</p>
                <p class="card-text">{{$tour->price}} р.</p>
                // Починить удаление
                <p class="card-text">{{$tour->operator->name}} р.</p>
                <a href="{{ route('tour.destroy') }}" class="btn btn-danger">Удалить</a>
            </div>
        </div>
    </div>
    <a href="{{ route('admin') }}" class="btn btn-primary">Вернуться</a>
@endsection