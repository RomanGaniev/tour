@extends('layout')

@section('content')
<div class="mt-5 ml-51 mr-51">
    <div class="box-header with-border">
        <div class="row justify-content-center">
            <div class="form-row">
                <div class="form-group">
                    <h3 class="box-title mr-2">Путевки</h3>
                </div>
                <div class="form-group">
                    <a href="{{ route('permits.create') }}" class="btn btn-success btn-sm">Добавить</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <section class="content">
            <div class="box-body">
                <div class="form-group">
                    
                </div>

                <table style="width: 100%" id="example1" class="table table-sm table-hover table-striped table-bordered" align="center">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Название тура</th>
                            <th>Питание</th>
                            <th>Проживание</th>
                            <th>"Горящая"</th>
                            <th>Кол-во человек</th>
                            <th>Стоимость (руб)</th>
                            <th>Скидка (руб)</th>
                            <th>Итого (руб)</th>
                            <th>Действия</th>


                        </tr>
                    </thead>

                    <tbody>

                        @foreach($permits as $permit)
                        <tr>
                            <td id="id_c"><b>{{$permit->id}}</b></td>

                            <td>{{$permit->tour->title}}</td>

                            <?php if($permit->food == 0) {?>
                                <td id="id_c">Нет</td>
                                <?php } else { ?>
                                <td id="id_c">Да</td>
                                <?php } ?>

                            <?php if($permit->residence == 0) {?>
                                <td id="id_c">Нет</td>
                                <?php } else { ?>
                                <td id="id_c">Да</td>
                                <?php } ?>

                            <?php if($permit->status == 0) {?>
                                <td id="id_c">Нет</td>
                                <?php } else { ?>
                                <td id="id_c">Да</td>
                                <?php } ?>

                                <td id="id_c">{{$permit->people}}</td>

                            

                            <td id="id_c">{{$permit->full_cost}}</td>

                            

                            <?php if($permit->discount == null) {?>
                            <td id="id_c">Без скидки</td>
                            <?php } else { ?>
                            <td id="id_c">{{$permit->discount}}</td>
                            <?php } ?>

                            <td id="id_c">{{$permit->discount_price}}</td>

                            <td id="id_c">

                                <div class="col-md-12">

                                    <div class="form-row">


                                        <div id="id_fg" class="form-group col-md-6">
                                            <a href="{{route('permits.edit', $permit->id)}}"
                                                class="btn btn-outline-primary btn-sm">Изменить</a>
                                        </div>

                                        
                                        <div id="id_fg" class="form-group col-md-6">
                                            <form action="{{ route('permits.destroy', $permit->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('are you sure?')" type="submit"
                                                    class="btn btn-outline-danger btn-sm">
                                                    Удалить
                                                </button>
                                            </form>
                                        </div>
                                        

                                    </div>

                                </div>

                            </td>
                        </tr>
                        @endforeach







                    </tbody>
                </table>

            </div>
        </section>
    </div>
</div>
@endsection