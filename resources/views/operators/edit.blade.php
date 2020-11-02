@extends('layout')

@section('content')
<main class="container mt-5">
    <form action="{{ route('operators.update', $operator->id) }}" accept-charset="UTF-8" method="post">
        @csrf
        @method('put')
        <div class="box-header with-border">
        <div class="row justify-content-center">
            <h3 class="box-title">Изменяем туроператора</h3>
        </div>
            
        </div>
        <br>
        <div class="box-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    @include('errors')
                    <label for="exx">Название</label>
                    <input name="title" type="text" class="form-control" id="exx" placeholder="" value="{{$operator->title}}"><br>
                    <label for="exx1">Контактная информация</label>
                    <input name="contacts" type="text" class="form-control" id="exx1" placeholder="" value="{{$operator->contacts}}">

                </div>
            </div>
        </div>
        <br>
        <div class="box-footer">
        <div class="row justify-content-center">
            <a href="{{ route('operators.index') }}" class="btn btn-default mr-5">Назад</a>
            <button class="btn btn-success pull-right">Изменить</button>
        </div>
        </div>
    </form>

</main>
@endsection