@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить статью
                <small>редактирование..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{route('news.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем статью</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $post->title }}" name="title">
                        </div>

                        <div class="form-group">
                            <img src="{{ $post->image }}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">
                            <input type="text" name="image_url" class="form-control my-3"
                                   placeholder="Или введите ссылку на изображение">

                            <p class="help-block">img, png etc...</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>

                            <select class="form-control js-example-tokenizer" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" name="category_id" selected =
                                    {{ $post->category == $category->title ? "selected" : '' }}>

                                        {{$category->title}}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            {{--<label>Теги</label>--}}
                            <div id="adminTags">
                                <admin-tags
                                        :taggable="true"
                                        :tags="{{ $post->tags }}"
                                        :token="'{{auth()->user()->api_token}}'">
                                </admin-tags>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Текст</label>
                            <textarea id="post-text" name="text">
                                {{$post->text}}
                            </textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right" type="submit">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            </form>
            <!-- /.box -->
        </section>
    </div>
    <!-- /.content-wrapper -->

    <script src="/js/adminTags.js"></script>
@endsection