@extends('layouts.base')

@section('title', 'Личный кабинет')

@section('content')
<section class="lk_intro d-flex">
    <div>
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
    </div>
    <img src="img/lk_intro.webp" class="" alt="">
</section>
<div class="container text-center my-5">
    <h2>История ваших путешествий</h2>
    <div class="table-responsive">
        <table class="table table-dark table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">Дата оформления</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Тур</th>
                    <th scope="col">Ночей</th>
                    <th scope="col">Человек</th>
                    <th scope="col">Дата отправления</th>
                    <th scope="col">Дата возвращения</th>
                    <th scope="col">Цена</th>
                    @php($order_num = count($watched_orders))
                    @if($order_num > 0)
                    <th scope="col">Отменить</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr id="order{{ $order->id }}" class="align-middle">
                    <th scope="row">{{ $order->created_at }}</th>
                    <td class="text-primary">{{ $order->status->name }}</td>
                    <td>{{ $order->tour->name }}, {{ $order->tour->country->name }}</td>
                    <td>{{ $order->tour->nights }}</td>
                    <td>{{ $order->tour->people }}</td>
                    <td>{{ $order->out_date }}</td>
                    <td>{{ $order->return_date }}</td>
                    <td>{{ $order->tour->price }} р.</td>
                    @if($order_num > 0)
                    <td>
                        @if($order->status->id == 1)
                        <a onclick="cancelOrder({{ $order->id }})" class="btn btn-danger">Отменить</a>
                        @endif
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="{{ asset('js/cancel_order.js') }}"></script>
<script src="{{ asset('js/tawkto.js') }}"></script>
@endsection
