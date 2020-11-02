@extends('layout')

@section('content')

<div class="box">
    <form action="{{ route('orders.nextedit', $tour_id) }}" accept-charset="UTF-8" method="post">
        @csrf
        <div class="box-header with-border">
            <h3 class="box-title">Изменяем заказ</h3>
            @include('errors')
        </div>
        <br>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                   

                    <label for="exx">Выберите тур</label>
                    {{ Form::select('tour_id', $tours, $tour_id, ['placeholder' => 'Выберите тур...', 'class' => 'form-control']) }}
                    <label for="exx">Путевка</label>
                    {{ Form::select('permit_id', $permits, $order->permit->tour->tour_id, ['class' => 'form-control']) }}
                    <br><label for="exx1">Заказчик</label><br>
                    <input type="text" class="form-control" id="exx" placeholder="Введите заказчика" name="klient" value="{{$order->klient}}"><br>
                    <label for="exx1">Оплачено</label>
                    <input type="checkbox" id="exx1" name="oplata">
                    
                    
                    
                </div>
            </div>
            
        </div>



        <div class="box-footer">
            <a href="{{ route('orders.index') }}" class="btn btn-default">Назад</a>
            <button class="btn btn-success pull-right">Далее</button>
        </div>
    </form>

</div>
@endsection