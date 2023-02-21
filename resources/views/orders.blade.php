@extends('layouts.base')

@section('title', 'Обработка заявок')

@section('content')
    <div class="container text-center my-5">
        <h2>Последние заявки</h2>
        <div class="table-responsive">
            <table class="table table-dark table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col">Дата оформления</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Клиент</th>
                        <th scope="col">Тур</th>
                        <th scope="col">Ночей</th>
                        <th scope="col">Человек</th>
                        <th scope="col">Дата отправления</th>
                        <th scope="col">Дата возвращения</th>
                        <th scope="col">Цена</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->created_at }}</th>
                            <td><a href="{{ route('status.change', ['order' => $order->id]) }}">{{ $order->status->name }}</a></td>
                            <td>{{ $order->users_id }}</td>
                            <td>{{ $order->tour->name }}, {{ $order->tour->country->name }}</td>
                            <td>{{ $order->tour->nights }}</td>
                            <td>{{ $order->tour->people }}</td>
                            <td>{{ $order->out_date }}</td>
                            <td>{{ $order->return_date }}</td>
                            <td>{{ $order->tour->price }} р.</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection