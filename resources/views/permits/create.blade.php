@extends('layout')

@section('content')

<main class="container mt-5">
    <form action="{{ route('permits.store') }}" accept-charset="UTF-8" method="post">
        @csrf
        <div class="box-header with-border">
            <div class="row justify-content-center">
                <h3 class="box-title">Добавляем путевку</h3>
            </div><br>
            @include('errors')
        </div>
        <div class="box-body">
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exx">Тур</label>
                            {{ Form::select('tour_id', $tours, null, ['placeholder' => 'Выберите тур...', 'class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exx1">Полная стоимость (руб.)</label><br>
                            <input type="text" class="form-control mr-10" id="exx"
                                placeholder="Введите полную стоимость" name="full_cost"
                                value="{{old('full_cost')}}"><br>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exx1">Скидка (руб.)</label><br>
                            <input type="text" class="form-control" id="exx" placeholder="Введите скидку"
                                name="discount" value="{{old('discount')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exx1">Количество человек</label>
                            <input type="text" class="form-control" id="exx" placeholder="Введите количество человек"
                                name="people" value="{{old('people')}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <br><label for="country_id">Питание</label>
                            <input class="mr-4" type="checkbox" id="exx1" name="food">

                            <label for="country_id">Проживание</label>
                            <input class="mr-4" type="checkbox" id="exx1" name="residence">

                            <label for="exx1">"Горящая"</label>
                            <input type="checkbox" id="exx1" name="status">
                        </div>
                    </div>
                </div>
            
        </div><br><br>

        <div class="row justify-content-center">
            <a href="{{ route('permits.index') }}" class="btn btn-default mr-5">Назад</a><br>
            <button class="btn btn-success pull-right">Добавить</button>

        </div>
    </form>

</main>
@endsection