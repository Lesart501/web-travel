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
                            <!-- Сделать select оператора -->
                            <div class="form-group">
                                <label for="txtTitle">ID туроператора</label>
                                <input type="number" name="operators_id" id="txtTitle" class="form-control @error('operators_id') is-invalid @enderror" value="{{$tour->operators_id}}">
                                @error('operators_id')
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
                            <input type="submit" class="btn btn-warning mt-2" value="Подтвердить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection