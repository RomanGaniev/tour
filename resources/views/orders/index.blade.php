@extends('layout')

@section('content')
<h4>Заказы</h4>

<div class="content-wrapper">
  <section class="content">
<div class="box-body">
    <div class="form-group">
      <a href="{{ route('orders.create') }}" class="btn btn-success">Добавить</a>
    </div>

    <table id="example1" class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>#</th>
                <th>Название тура</th>
                <th>код тура</th>
                <th>Заказчик</th>
                <th>Оплата</th>
                <th>Действия</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{optional(optional($order->permit)->tour)->title}}</td>
                <td>{{optional(optional($order->permit)->tour)->id}}</td>
                <td>{{$order->klient}}</td>
                <?php if($order->oplata == 0) {?>
                   <td>Не оплачено</td>       
                <?php } else { ?> 
                    <td>Оплачено</td>
                <?php } ?>
                @if ($order->permit)
                <td><a href="{{ route('orders.nextedit', [

                    'tour_id'=>$order->permit->tour->id, 'id'=>$order->id, 'klient' => $order->klient

                ]) }}" class="btn btn-outline-primary btn-sm">Изменить</a> 
                    
                <form action="{{ route('orders.destroy', $order->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-outline-danger btn-sm">
                        <i>Удалить</i>
                    </button>
                </form>
                @else
                <td>
                    Not exists
                </td>
                @endif
            </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>

</div>
</section>
</div>
@endsection