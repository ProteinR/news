@extends('layout')
@section('content')

    <div id="newsIndex" class="mt-2">
        <news :news="this.preloadedNews">

        </news>
    </div>



    {{--<script src="/js/loadnews.js"></script>--}}
    {{--<script src="/js/loadcategories.js"></script>--}}

    {{-- list of news--}}
    <script src="/js/news.js"></script>
@endsection
