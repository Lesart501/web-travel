@extends('layouts.admin_base')

@section('title', 'Удалить тур')

@section('content')
    <div class="container-xxl d-flex justify-content-evenly my-5">
        <img class="card-img-top img-fluid w-50" src="../../storage/uploads/{{$tour->image}}">
        <div class="ml-3">
            <h5 class="card-title">{{$tour->name}}, {{$tour->country->name}}</h5>
            <p class="card-text my-4"><b>Ночей:</b>    {{$tour->nights}}</p>
            <p class="card-text"><b>Человек:</b>    {{$tour->people}}</p>
            <h4 class="card-text text-primary">{{$tour->price}} р.</h4>
            <form action="{{ route('tour.destroy', ['tour' => $tour->id]) }}" method="post">
                @csrf
                <div class="my-4">
                    <input type="submit" value="Удалить" class="btn btn-danger">
                    <a href="{{ route('index') }}" class="btn btn-primary">Вернуться</a>
                </div>
            </form>
        </div>
    </div>
@endsection