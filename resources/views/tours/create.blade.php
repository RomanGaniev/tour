@extends('layout')

@section('content')
<main class="container mt-5">
    <form action="{{ route('tours.store') }}" accept-charset="UTF-8" method="post">
        @csrf
        <div class="box-header with-border">
            <div class="row justify-content-center">
                <h3 class="box-title">Добавляем тур</h3>
            </div><br>
            @include('errors')
        </div>
        
        <div class="box-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <label for="exx">Название</label>
                        <input type="text" class="form-control" id="exx" placeholder="Введите название тура"
                            name="title"><br>
                        <label for="country_id">Страна</label>
                        {{ Form::select('country_id', $countries, null, ['placeholder' => 'Выберите страну...', 'class' => 'form-control']) }}
                        <br>
                        <label for="operator_id">Туроператор</label>
                        {{ Form::select('operator_id', $operators, null, ['placeholder' => 'Выберите оператора...', 'class' => 'form-control']) }}
                    </div>
                    <div class="col-md-6">
                        <div class="row-md-1">
                            <label for="exx1">Описание</label>
                        </div>
                        <div class="row-md-5">
                            <textarea type="text" class="form-control" id="exx1" placeholder="Введите описание тура"
                                name="description" style="height: 227px; resize: none">{{old('description')}}</textarea><br>
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