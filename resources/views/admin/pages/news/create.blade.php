@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить статью
                <small>Создание новости...</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    @include('admin.errors')

                    <h3 class="box-title">Добавляем статью</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title" value="{{old('title')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">
                            <input type="text" name="image_url" class="form-control my-3"
                                   placeholder="Или введите ссылку на изображение">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            <span>categories list</span>

                        </div>
                        <div class="form-group">
                            <label></label>

                            <div id="adminTags">
                                <admin-tags :taggable="true" :token="'{{auth()->user()->api_token}}'"></admin-tags>
                            </div>


                            <label>Категория</label>
                            <select class="form-control js-example-tokenizer" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" name="category_id">{{$category->title}}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea id="post-text" name="text">
                                {{old('text')}}
                            </textarea>

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{url()->previous()}}" class="btn btn-default">Назад</a>
                    <button class="btn btn-success pull-right" type="submit">Добавить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </form>
        </section>
        <!-- /.content -->
    </div>


    <script src="/js/adminTags.js"></script>

@endsection