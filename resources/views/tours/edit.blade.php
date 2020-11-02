@extends('layout')

@section('content')
<main class="container mt-5">
    <form action="{{ route('tours.update', $tour->id) }}" accept-charset="UTF-8" method="post">
        @csrf
        @method('put')
        <div class="box-header with-border">
            <div class="row justify-content-center">
                <h3 class="box-title">Изменяем тур</h3>
            </div><br>
            @include('errors')
        </div>
        <div class="box-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <label for="exx">Название</label>
                        <input name="title" type="text" class="form-control" id="exx" placeholder=""
                            value="{{$tour->title}}"><br>
                        <label for="country_id">Страна</label>
                        {{ Form::select('country_id', $countries, $tour->country->id, ['class' => 'form-control']) }}
                        <br>
                        <label for="operator_id">Туроператор</label>
                        {{ Form::select('operator_id', $operators, $tour->operator->id, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-6">
                        <div class="row-md-1">
                            <label for="exx1">Описание</label>
                        </div>
                        <div class="row-md-5">
                            <textarea name="description" type="text" class="form-control"
                                style="height: 227px; resize: none">{{$tour->description}}</textarea><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="box-footer">
            <div class="row justify-content-center">
                <a href="{{ route('tours.index') }}" class="btn btn-default mr-5">Назад</a>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
        </div>
    </form>
</main>
@endsection