@extends('layout')
@section('content')

    <table class="table table-bordered table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">api_key</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
            <th >{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->api_token }}</td>
            <td>
                <a href="{{ route('wishes.edit', $user->id) }}"><i class="fas fa-edit"></i></a>

                <form action="{{route('wishes.destroy', $user->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                    <i class="fas fa-trash-alt">
                        <input type="hidden" name="input" value="">
                    </i>
                    {{--<input type="image" name="submit" src="" value="" >--}}
                </form>
{{--                <a href="{{ route('wishes.destroy', $wish->id) }}"><i class="fas fa-trash-alt"></i></a>--}}
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection