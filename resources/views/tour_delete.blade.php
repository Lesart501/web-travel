@extends('layouts.base')

@section('title', 'Удалить тур')

@section('content')
    <div class="container-xxl d-flex justify-content-evenly my-5 booking">
        <img class="card-img-top img-fluid booking-image rounded" src="../../storage/uploads/tours/{{$tour->image}}">
        <div class="ml-3">
            <h4 class="card-title mb-4">{{$tour->name}}</h5>
            <h5 class="card-text">{{$tour->place}}, {{$tour->country->name}}</h5>
            <p class="card-text my-4"><b>Ночей:</b>    {{$tour->nights}}</p>
            <p class="card-text"><b>Человек:</b>    {{$tour->people}}</p>
            <p class="card-text"><b>Туроператор:</b>    {{$tour->operator->name}}</p>
            <h4 class="card-text text-primary">{{$tour->price}} р.</h4>
            <form action="{{ route('tour.destroy', ['tour' => $tour->id]) }}" method="post">
                @csrf
                <div class="my-4">
                    <input type="submit" value="Удалить" class="btn btn-primary">
                    <a href="{{ route('admin') }}" class="btn btn-danger">Назад</a>
                </div>
            </form>
            <div class="desc">
                <label class="fw-bold">Описание</label>
                <p class="card-text mt-2">{{ $tour->description }}</p>
            </div>
        </div>
    </div>
@endsection
