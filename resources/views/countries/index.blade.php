@extends('layout')

@section('content')
<div class="mt-5 ml-11 mr-11">
    <div class="box-header with-border">
        <div class="row justify-content-center">
            <div class="form-row">
                <div class="form-group">
                    <h3 class="box-title mr-2">Страны</h3>
                </div>
                <div class="form-group">
                    <a href="{{ route('countries.create') }}" class="btn btn-success btn-sm">Добавить</a>
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
                            <th>Страна</th>
                            <th>Необходимость визы</th>
                            <th>Действия</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($countries as $country)
                        <tr>
                            <td id="id_c"><b>{{$country->id}}</b></td>
                            <td id="id_c">{{$country->title}}</td>
                            <?php if($country->visa == 0) {?>
                            <td id="id_c">Нет</td>
                            <?php } else { ?>
                            <td id="id_c">Да</td>
                            <?php } ?>




                            <td id="id_c">
                                <div class="col-md-12">
                                    <div class="form-row">


                                        <div id="id_fg" class="form-group col-md-6">
                                            <a href="{{route('countries.edit', $country->id)}}"
                                                class="btn btn-outline-primary btn-sm">Изменить</a>
                                        </div>

                                        <div id="id_fg" class="form-group col-md-6">
                                            <form action="{{ route('countries.destroy', $country->id)}}" method="post">
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