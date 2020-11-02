@extends('layout')

@section('content')
<main class="container mt-5">
    <form action="{{ route('operators.store') }}" accept-charset="UTF-8" method="post">
        @csrf
        <div class="box-header with-border">
            <div class="row justify-content-center">
                <h3 class="box-title">Добавляем оператора</h3>
            </div>
            
        </div>
        <br>
        <div class="box-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        @include('errors')
                        <label for="exx">Название</label>
                        <input type="text" class="form-control" id="exx" placeholder="Введите название туроператора"
                            name="title"><br>
                        <label for="exx1">Контактная информация</label>
                        <input type="text" class="form-control" id="exx1" placeholder="Введите контакты туроператора"
                            name="contacts">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="box-footer">
            <div class="row justify-content-center">
                <a href="{{ route('operators.index') }}" class="btn btn-default mr-5">Назад</a>
                <button class="btn btn-success pull-right">Готово</button>
            </div>
        </div>
    </form>
</main>
@endsection