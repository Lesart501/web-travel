@extends('layouts.base')

@section('title', 'Бронирование тура')

@section('content')
    <div class="container-xxl d-flex justify-content-evenly my-5">
        <img class="card-img-top img-fluid w-50" src="../../storage/uploads/{{$tour->image}}">
        <div class="ml-3">
            <h5 class="card-title">{{$tour->name}}, {{$tour->country->name}}</h5>
            <p class="card-text my-4"><b>Ночей:</b>    {{$tour->nights}}</p>
            <p class="card-text"><b>Человек:</b>    {{$tour->people}}</p>
            <form action="{{ route('book', ['tour' => $tour->id]) }}" method="post">
                @csrf
                <div class="form-group my-4">
                    <label for="txtTitle">Дата отправления</label>
                    <input type="date" name="out_date" id="txtTitle" class="form-control mt-2 mb-4">
                </div>
                <div class="form-group my-4">
                    <label for="txtTitle">Дата отправления</label>
                    <input type="date" name="return_date" id="txtTitle" class="form-control mt-2">
                </div>
                <h4 class="card-text text-primary">{{$tour->price}} р.</h4>
                <div class="my-4">
                    <input type="submit" value="Забронировать" class="btn btn-primary">
                    <a href="{{ route('index') }}" class="btn btn-primary">Вернуться</a>
                </div>
            </form>
        </div>
    </div>
@endsection