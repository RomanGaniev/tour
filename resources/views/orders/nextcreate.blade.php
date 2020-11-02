@extends('layout')

@section('content')
<main class="container mt-5">
    <form action="{{ route('orders.store') }}" accept-charset="UTF-8" method="post">
        @csrf
        <div class="box-header with-border">
            <div class="row justify-content-center">
                <h3 class="box-title">Добавляем заказ, шаг #2</h3>
            </div>
            
        </div>
        <br>
        <div class="box-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        @include('errors')
                        <label for="exx">Путевка</label>
                        {{ Form::select('permit_id', $permits, null, ['placeholder' => 'Выберите путевку...', 'class' => 'form-control']) }}
                        <br><label for="exx1">Заказчик</label><br>
                        <input type="text" class="form-control" id="exx" placeholder="Введите заказчика" name="klient"
                            value="{{old('klient')}}"><br>
                        <div class="row justify-content-left">
                            <div class="form-check">
                                <label for="exx1">Оплачено</label>
                                <input type="checkbox" id="exx1" name="oplata">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <div class="row justify-content-center">
                <a href="{{ route('orders.create') }}" class="btn btn-default mr-5">Назад</a>
                <button class="btn btn-success pull-right">Оформить</button>
            </div>
        </div>
    </form>

</main>
@endsection