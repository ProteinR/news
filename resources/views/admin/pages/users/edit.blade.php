@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редактирование пользователя
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            {{--{{ Form::open([--}}
                {{--'route' => ['users.update', $user->id],--}}
                {{--'method' => 'put',--}}
                {{--'files' => true--}}
            {{--]) }}--}}
            <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем пользователя</h3>
{{--                    @include('admin.errors')--}}
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Skype</label>
                            <input type="text" name="skype" class="form-control" placeholder="" value="{{ $user->skype
                            }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telegram</label>
                            <input type="text" name="telegram" class="form-control" placeholder="" value="{{
                            $user->telegram }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">О себе</label>
                            <input type="text" name="about" class="form-control" placeholder="" value="{{ $user->about
                            }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Интересы</label>
                            <input type="" name="interest" class="form-control" placeholder=""
                                   value="{{ $user->interest }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль</label>
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Подтвердить пароль</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <img src="{{ $user->avatar }}" alt="" width="200" class="img-responsive">
                            <label for="exampleInputFile">Аватар</label>
                            <input type="file" name="avatar" id="exampleInputFile">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>
                        <div class="form-group">
                            <label for="role">Роль</label>
                            <select name="role" id="role">
                                @foreach($roles as $role)
                                    <option value="{{ $role }}" {{$role == $user->getRoleNames()[0] ? 'selected' :
                                    ''}}>{{$role}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            </form>

            <!-- /.box -->
            {{--{{ Form::close() }}--}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection