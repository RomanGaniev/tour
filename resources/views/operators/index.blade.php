@extends('layout')

@section('content')
<div class="mt-5 ml-10 mr-10">
    <div class="box-header with-border">
        <div class="row justify-content-center">
            <div class="form-row">
                <div class="form-group">
                    <h3 class="box-title mr-2">Туроператоры</h3>
                </div>
                <div class="form-group">
                    <a href="{{ route('operators.create') }}" class="btn btn-success btn-sm">Добавить</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <section class="content">
            <div class="box-body">
                <div class="form-group">

                </div>

                <table style="width: 100%" id="example1" class="table table-sm table-hover table-striped table-bordered"
                align="center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Название туроператора</th>
                            <th>Контакты</th>
                            <th>Действия</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($operators as $operator)
                        <tr>
                            <td id="id_c"><b>{{$operator->id}}</b></td>
                            <td>{{$operator->title}}</td>
                            <td>{{$operator->contacts}}</td>
                            <td id="id_c">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div id="id_fg" class="form-group col-md-6">
                                            <a href="{{route('operators.edit', $operator->id)}}"
                                                class="btn btn-outline-primary btn-sm">Изменить</a>
                                        </div>
                                        <div id="id_fg" class="form-group col-md-6">
                                            <form action="{{ route('operators.destroy', $operator->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('are you sure?')" type="submit"
                                                    class="btn btn-outline-danger btn-sm">
                                                    <i>Удалить</i>
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