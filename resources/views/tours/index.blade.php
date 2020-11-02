@extends('layout')

@section('content')
<div class="mt-5 ml-10 mr-10">
    <div class="box-header with-border">
        <div class="row justify-content-center">
            <div class="form-row">
                <div class="form-group">
                    <h3 class="box-title mr-2">Туры</h3>
                </div>
                <div class="form-group">
                    <a href="{{ route('tours.create') }}" class="btn btn-success btn-sm">Добавить</a>
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
                        <tr align="center">
                            <th>#</th>
                            <th>Название тура</th>
                            <th>Описание</th>
                            <th>Страна</th>
                            <th>Туроператор</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tours as $tour)
                        <tr>
                            <td id="id_c"><b>{{$tour->id}}</b></td>
                            <td>{{$tour->title}}</td>
                            <td>{{$tour->description}}</td>
                            <td id="id_c">{{$tour->country->title}}</td>
                            <td id="id_c">{{$tour->operator->title}}</td>

                            <td id="id_c">
                                <div class="col-md-12">
                                    <div class="form-row">

                                        
                                        <div id="id_fg" class="form-group col-md-6">
                                            <a href="{{route('tours.edit', $tour->id)}}"
                                            class="btn btn-outline-primary btn-sm">Изменить</a>
                                        </div>

                                        <div id="id_fg" class="form-group col-md-6">
                                        <form action="{{ route('tours.destroy', $tour->id)}}" method="post">
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