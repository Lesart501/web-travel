@extends('layouts.admin_base')

@section('title', 'Удалить тур')

@section('content')
    <div class="container">
        <a href="{{ route('admin') }}" class="btn btn-primary m-5">Вернуться</a>
    </div>
    <div class="container d-flex justify-content-center text-center">
        <div class="card" style="width: 20rem;">
        <form action="" method="post"></form>
            <!-- <img class="card-img-top" src="{{$tour->image}}"> -->
            <div class="card-body">
                <h5 class="card-title">{{$tour->name}}, {{$tour->country->name}}</h5>
                <p class="card-text">{{$tour->nights}} ночей, {{$tour->people}} человека</p>
                <p class="card-text">{{$tour->price}} р.</p>
                <p class="card-text">{{$tour->operator->name}}</p>
                <form action="{{ route('tour.destroy', ['tour' => $tour->id]) }}" method="post">
                    @csrf
                    <input type="submit" value="Удалить" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
@endsection