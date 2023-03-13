@extends('layouts.base')

@section('title', 'Добавить тур')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Добавить тур</div>
                    <div class="card-body border border-3 border-dark rounded-bottom">
                        <form action="{{ route('tour.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="txtTitle">Название</label>
                                        <input type="text" name="name" id="txtTitle" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="txtTitle">Направление</label>
                                        <input type="text" name="place" id="txtTitle" class="form-control @error('place') is-invalid @enderror">
                                        @error('place')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="txtTitle">Страна</label>
                                        <select class="form-select @error('country') is-invalid @enderror" name="country" aria-label="Default select example">
                                            @foreach ($countries as $country)
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
                                        <input type="number" name="people" id="txtTitle" class="form-control @error('people') is-invalid @enderror">
                                        @error('people')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="txtTitle">Ночей</label>
                                        <input type="number" name="nights" id="txtTitle" class="form-control @error('nights') is-invalid @enderror">
                                        @error('nights')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="txtTitle">Изображение</label>
                                        <input type="file" name="image" id="image" value="default.jpg" class="form-control @error('image') is-invalid @enderror" enctype="multipart/form-data">
                                        @error('image')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="txtTitle">ID туроператора</label>
                                        <select class="form-select @error('operator') is-invalid @enderror" name="operator" aria-label="Default select example">
                                            @foreach ($operators as $operator)
                                                <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('operators_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="txtTitle">Цена</label>
                                        <input type="number" name="price" id="txtTitle" class="form-control @error('prices') is-invalid @enderror">
                                        @error('price')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtTitle">Описание</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror"></textarea>
                                        @error('description')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <div class="mt-3">
                                        <input type="submit" class="btn btn-primary" value="Добавить">
                                        <a href="{{ route('admin') }}" class="btn btn-danger">Назад</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
