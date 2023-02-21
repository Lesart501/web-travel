@extends('layouts.base')

@section('title', 'Редактировать тур')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Редактировать тур</div>
                    <div class="card-body border border-3 border-dark rounded-bottom">
                        <form action="{{ route('tour.update', ['tour' => $tour->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="txtTitle">Название</label>
                                <input type="text" name="name" id="txtTitle" class="form-control @error('name') is-invalid @enderror" value="{{$tour->name}}">
                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Страна</label>
                                <select class="form-select @error('country') is-invalid @enderror" name="country" aria-label="Default select example">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Человек</label>
                                <input type="number" name="people" id="txtTitle" class="form-control @error('people') is-invalid @enderror" value="{{$tour->people}}">
                                @error('people')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Ночей</label>
                                <input type="number" name="nights" id="txtTitle" class="form-control @error('nights') is-invalid @enderror" value="{{$tour->nights}}">
                                @error('nights')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Изображение</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" enctype="multipart/form-data">
                                @error('image')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Туроператор</label>
                                <select class="form-select @error('operator') is-invalid @enderror" name="operator" aria-label="Default select example">
                                    @foreach($operators as $operator)
                                        <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                                    @endforeach
                                </select>
                                @error('operator')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Цена</label>
                                <input type="number" name="price" id="txtTitle" class="form-control @error('price') is-invalid @enderror" value="{{$tour->price}}">
                                @error('price')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <input type="submit" class="btn btn-primary" value="Подтвердить">
                                <a href="{{ route('admin') }}" class="btn btn-danger">Назад</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection