@extends('layout')
@section('content')

    <div id="userProfile" class="mt-2">
        <user-profile :user="this.user">

        </user-profile>
    </div>



    {{--<script src="/js/loadnews.js"></script>--}}
    {{--<script src="/js/loadcategories.js"></script>--}}

    {{-- list of news--}}
    <script src="/js/user.js"></script>
@endsection
<script>

    import UserProfile from "/js/components/UserProfile";
    export default {
        components: {UserProfile}
    }
    // $('#myTable').DataTable();
    // console.log($("#myTable"));
</script>