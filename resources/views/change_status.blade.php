@extends('layouts.admin_base')

@section('title', 'Изменить статус заявки')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить тур</div>
                <div class="card-body">
                    <form action="{{ route('status.save', ['order' => $order->id]) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')
                        <select class="form-select" name="status" aria-label="Default select example">
                            @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                        <input type="submit" class="btn btn-primary mt-2" value="Подтвердить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection