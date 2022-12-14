@extends('layouts.admin_base')

@section('title', 'Изменить статус заявки')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить тур</div>
                <div class="card-body">
                    <form action="{{ route('status.save') }}" method="POST">
                        @csrf
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option value="В обработке">В обработке</option>
                            <option value="Принята">Принята</option>
                            <option value="Отклонена">Отклонена</option>
                        </select>
                        <input type="submit" class="btn btn-primary mt-2" value="Добавить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection