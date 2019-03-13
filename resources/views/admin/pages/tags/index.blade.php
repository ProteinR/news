@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Теги
                <small></small>
            </h1>
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
                {{--<li><a href="#">Examples</a></li>--}}
                {{--<li class="active">Blank page</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список тегов</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Тег</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->title}}</td>
                                <td>
                                    <form action="{{route('tags.destroy', $tag->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Удалить ' +
                                     'тег?') ? true : false;">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection