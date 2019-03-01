@extends('layout')
@section('content')


    <div id="userProfile" class="mt-2" v-if="this.user != undefined">
        <user-profile :user="this.user">

        </user-profile>
    </div>


    <script src="/js/user.js"></script>
@endsection
