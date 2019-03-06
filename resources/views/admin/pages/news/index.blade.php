@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admin page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            {{--<form action="">--}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг сущности</h3>
                    {{--@include('admin.errors')--}}
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('news.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Теги</th>
                            <th>Картинка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $post)
                            <tr>
                                <td> {{ $post->id }} </td>
                                <td> {{ $post->title }} </td>
                                <td> {{ $post->category->title }} </td>
                                <td>
                                    @foreach($post->tags as $tag)
                                        {{ $tag->title.' '}}
                                    @endforeach
                                </td>

                                <td>
                                    <img src=" {{ $post->image}} " alt="" width="100">
                                </td>

                                <td><a href="{{ route('news.edit', $post->id) }}"><button class="btn btn-primary"><i
                                                    class="fa
                                fa-pencil"></i></button></a>
                                    <form action="{{route('news.destroy', $post->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure?')">
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

            {{--</form>--}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection