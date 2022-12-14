@extends('layouts.base')

@section('title', 'Бронирование тура')

@section('content')
<div class="container">
        <a href="{{ route('index') }}" class="btn btn-primary m-5">Вернуться</a>
    </div>
    <div class="container d-flex justify-content-center text-center">
        <div class="card" style="width: 20rem;">
        <form action="" method="post"></form>
            <div class="card-body">
                <h5 class="card-title">{{$tour->name}}, {{$tour->country}}</h5>
                <p class="card-text">{{$tour->nights}} ночей, {{$tour->people}} человека</p>
                <p class="card-text">{{$tour->price}} р.</p>
                <p class="card-text">{{$tour->operator->name}}</p>
                <form action="{{ route('book', ['tour' => $tour->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtTitle">Дата отправления</label>
                        <input type="date" name="out_date" id="txtTitle" class="form-control mt-2 mb-4">
                    </div>
                    <input type="submit" value="Забронировать" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection