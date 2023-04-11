@extends('layouts.base')

@section('title', 'Редактирование туров')

@section('content')
    <div class="d-flex justify-content-start m-5 add_and_search">
        <a href="{{ route('tour.add') }}" class="btn btn-primary">+ Добавить тур</a>
        <input type="search" name="search" id="admin_search" class="form-control" placeholder="Поиск">
    </div>

    <section class="tours text-center mb-5">
        <div class="container d-flex justify-content-center">
            <div class="row row-cols-3 gap-3 d-flex justify-content-center" id="tours">
                @foreach($tours as $tour)
                    <div class="card col p-0" style="width: 20rem;">
                        <img class="card-img-top" src="storage/uploads/tours/{{$tour->image}}">
                        <div class="card-body">
                            <h4 class="card-title mb-3">{{$tour->name}}</h5>
                            <h5 class="card-text">{{$tour->place}}, {{$tour->country->name}}</h5>
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


    <script src="js/search.js"></script>
@endsection
