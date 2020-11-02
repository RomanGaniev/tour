@extends('layout')

@section('content')
<main class="container mt-5">
    <form action="{{ route('countries.store') }}" accept-charset="UTF-8" method="post">
        @csrf
        <div class="box-header with-border">
            <div class="row justify-content-center">
                <h3 class="box-title">Добавляем страну</h3>
            </div>
            
        </div><br>
        <div class="box-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        @include('errors')
                        <label for="exx">Название</label>
                        <input type="text" class="form-control" id="exx" placeholder="Введите название страны"
                            name="title"><br>
                        <div class="row justify-content-left">
                            <div class="form-check">
                                <label for="exx1">Необходимость визы</label>
                                <input type="checkbox" id="exx1" name="visa">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="box-footer">
            <div class="row justify-content-center">
                <a href="{{ route('countries.index') }}" class="btn btn-default mr-5">Назад</a>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
        </div>
    </form>
</main>
@endsection