@extends('layouts.base')

@section('title', 'Бронирование тура')

@section('content')
<div class="container-xxl d-flex justify-content-evenly my-5 booking">
    <img class="card-img-top img-fluid booking-image rounded" src="../../storage/uploads/tours/{{$tour->image}}">
    <div class="ml-3 mt-3">
        <form action="{{ route('book', ['tour' => $tour->id]) }}" method="post">
            @csrf
            <h4 class="card-title mb-4">{{$tour->name}}</h5>
            <h5 class="card-text">{{$tour->place}}, {{$tour->country->name}}</h5>
            <div class="form-group my-4">
                <label class="fw-bold" for="txtTitle">Ночей:</label>
                <input type="number" name="return_date" id="nights" class="bg-white border-none text-dark" value="{{$tour->nights}}" disabled>
            </div>
            <p class="card-text"><b>Человек:</b>    {{$tour->people}}</p>
            <div class="form-group my-4">
                <label class="fw-bold" for="txtTitle">Дата отправления</label>
                <input type="date" name="out_date" id="out_date" class="form-control @error('out_date') is-invalid @enderror mt-2 mb-4">
                @error('out_date')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group my-4">
                <label class="fw-bold" for="txtTitle">Дата возвращения</label>
                <input type="date" name="return_date" id="return_date" class="form-control @error('out_date') is-invalid @enderror mt-2" readonly>
            </div>
            <div class="form-group mb-4">
                <label class="fw-bold" for="phone-mask">Ваш номер телефона</label>
                <input type="tel" name="phone" id="phone-mask" class="form-control @error('phone') is-invalid @enderror" value="{{ Auth::user()->phone }}">
                @error('phone')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <h4 class="card-text text-primary">{{$tour->price}} р.</h4>
            <div class="my-4">
                <input type="submit" value="Забронировать" class="btn btn-primary">
                <a href="{{ route('index') }}" class="btn btn-danger">Назад</a>
            </div>
        </form>
        <div class="desc">
            <label class="fw-bold">Описание</label>
            <p class="card-text mt-2">{{ $tour->description }}</p>
        </div>
    </div>
</div>


<script src="https://unpkg.com/imask"></script>
<script src="{{ asset('../../js/set_return_date.js') }}"></script>
@endsection
