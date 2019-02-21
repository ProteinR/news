@extends('layout')
@section('content')

    <div id="vue-post" class="mt-2">
        <post-show :post="this.postData">

        </post-show>
    </div>

    <script>
{{--        var NewsId = {{$newsId}}--}}
    </script>
    <script src="/js/postShow.js"></script>
@endsection
