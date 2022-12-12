@extends('layouts.base')

@section('title', 'Личный кабинет')

@section('content')
    <div class="container text-center my-5">
        <h2>История ваших путешествий</h2>
    <table class="table table-dark table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">Дата оформления</th>
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
                    <td>{{ $order->tour->name }}, {{ $order->tour->country }}</td>
                    <td>{{ $order->tour->nights }}</td>
                    <td>{{ $order->tour->people }}</td>
                    <td>{{ $order->out_date }}</td>
                    <td>{{ $order->return_date }}</td>
                    <td>{{ $order->tour->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection