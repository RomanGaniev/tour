@extends('layout')

@section('content')
<main class="container mt-5">
    <div class="box-header with-border">
        <div class="row justify-content-center">
            <h3 class="box-title">Изменяем заказ</h3>
        </div>
        @include('errors')
    </div>
    <br>
    <div class="box-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <form action="{{ route('orders.next', [
                        'id'=>$id, 
                        'tour_id'=>$tour_id, 
                        'klient' => $klient]) }}" accept-charset="UTF-8" method="post">
                        @csrf
                        <label for="exx">Тур</label>
                        {{ Form::select('tour_next_id', $tours, $tour_id, [
                            'class' => 'form-control']) }}
                        <br>
                        <div class="alert alert-warning">Внимание! Убедитесь, что Вы обновили список путевок, перед ее выбором!</div>
                        <button class="btn btn-success pull-right">Обновить путевки =></button>
                    </form>
                </div>
                
                <div class="form-group">
                    <form action="{{ route('orders.update', $id) }}" accept-charset="UTF-8" method="post">
                        @csrf
                        @method('put')
                        {{ Form::select('tour_id', $tours, $tour_id, [
                        'placeholder' => 'Выберите тур...', 
                        'class' => 'form-control', 
                        'style' => 'display: none;']) }}
                        <label for="exx">Путевка</label>
                        {{ Form::select('permit_id', $pers, null, [
                        'class' => 'form-control']) }}
                        <br><label for="exx1">Заказчик</label>
                        <br>
                        <input type="text" class="form-control" id="exx" placeholder="Введите заказчика" name="klient"
                            value="{{$klient}}"><br>
                        <div class="row justify-content-left">
                            <div class="form-check">
                                <label for="exx1">Оплачено</label>
                                <input type="checkbox" id="exx1" name="oplata">
                            </div>
                        </div>
                        <br>
                        <div class="box-footer">
                            <div class="row justify-content-center">
                                <a href="{{ route('orders.index') }}" class="btn btn-default mr-5">Назад</a>
                                <button class="btn btn-success pull-right">Готово</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</main>
@endsection