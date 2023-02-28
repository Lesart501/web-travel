@extends('layouts.base')

@section('title', 'Изменить статус заявки')

@section('content')
<div class="container mt-5 vh-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">Ответить на заявку</div>
                <div class="card-body border border-3 border-dark rounded-bottom">
                    <form action="{{ route('status.save', ['order' => $order->id]) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')
                        <select class="form-select" name="status" aria-label="Default select example">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                        <div class="mt-2">
                            <input type="submit" class="btn btn-primary" value="Подтвердить">
                            <a href="{{ route('orders') }}" class="btn btn-danger">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection