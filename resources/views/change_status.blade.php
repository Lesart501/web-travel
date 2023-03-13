@extends('layouts.base')

@section('title', 'Изменить статус заявки')

@section('content')
<section class="order row mx-3">
    <div class="container row row-cols-2">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-dark text-white">Пользователь</div>
                        <div class="card-body border border-3 border-dark rounded-bottom text-center">
                            <img src="../../img/icons/profile.png" alt="" class="mb-4">
                            <h3 class="mb-3">{{ $order->user->name }}</h3>
                            <p><a href="mailto:{{ $order->user->email }}">{{ $order->user->email }}</a></p>
                            <p><a href="tel:{{ $order->user->phone }}">{{ $order->user->phone }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-dark text-white">Заказ</div>
                        <div class="card-body border border-3 border-dark rounded-bottom text-center lh-lg">
                            <h4 class="card-title mt-3">{{$order->tour->name}}</h5>
                            <h5 class="card-text my-4">{{$order->tour->place}}, {{$order->tour->country->name}}</h5>
                            <p class="card-text"><b>Ночей:</b> {{$order->tour->nights}}</p>
                            <p class="card-text"><b>Человек:</b> {{$order->tour->people}}</p>
                            <p class="card-text"><b>Дата отправления:</b> {{$order->out_date}}</p>
                            <p class="card-text"><b>Дата возвращения:</b> {{$order->return_date}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Изменить статус</div>
                    <div class="card-body border border-3 border-dark rounded-bottom text-center lh-lg">
                        <form action="{{ route('status.save', ['order' => $order->id]) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="form-select" name="status" aria-label="Default select example">
                                @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                            <div class="mt-3">
                                <input type="submit" class="btn btn-primary" value="Подтвердить">
                                <a href="{{ route('orders') }}" class="btn btn-danger">Назад</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
