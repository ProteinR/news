@extends('layout')
@section('content')

    <div id="newsIndex" class="pt-3">
        <news :news="this.preloadedNews">

        </news>
    </div>



    {{--<script src="/js/loadnews.js"></script>--}}
    {{--<script src="/js/loadcategories.js"></script>--}}

    {{-- list of news--}}
    <script src="/js/news.js"></script>


@endsection



