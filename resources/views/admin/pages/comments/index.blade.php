@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
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

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг сущности</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Пользователь</th>
                            <th>Текст</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->user->name}}</td>
                            <td>{{$comment->text}}</td>
                            <td>

{{--                                    {{Form::open(['route'=>['comments.destroy', $comment->id], 'method'=>'delete'])}}--}}
                                <form action="{{route('comment.destroy', $comment->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" onclick="confirm('Are you sure?')">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    {{--{{Form::close()}}--}}
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