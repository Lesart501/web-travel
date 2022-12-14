@extends('layouts.admin_base')

@section('title', 'Редактировать тур')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать тур</div>
                    <div class="card-body">
                        <form action="{{ route('tour.update', ['tour' => $tour->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="txtTitle">Название</label>
                                <input type="text" name="name" id="txtTitle" class="form-control" value="{{$tour->name}}">
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Страна</label>
                                <input type="text" name="country" id="txtTitle" class="form-control" value="{{$tour->country}}">
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Человек</label>
                                <input type="number" name="people" id="txtTitle" class="form-control" value="{{$tour->people}}">
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Ночей</label>
                                <input type="number" name="nights" id="txtTitle" class="form-control" value="{{$tour->nights}}">
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Изображение</label>
                                <input type="file" name="image" id="image " class="form-control" enctype="multipart/form-data">
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">ID туроператора</label>
                                <input type="number" name="operators_id" id="txtTitle" class="form-control" value="{{$tour->operators_id}}">
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Цена</label>
                                <input type="number" name="price" id="txtTitle" class="form-control" value="{{$tour->price}}">
                            </div>
                            <input type="submit" class="btn btn-primary mt-2" value="Подтвердить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection