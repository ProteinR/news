@extends('layout')
@section('content')

    <table class="table table-bordered table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Need</th>
            <th scope="col">Want</th>
            <th scope="col">Price</th>
            <th scope="col">Ratio</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($wishes as $wish)
            <tr>
            <th >{{ $wish->id }}</th>
            <td>{{ $wish->name }}</td>
            <td>{{ $wish->need }}</td>
            <td>{{ $wish->want }}</td>
            <td>{{ $wish->price }}</td>
            <td>{{ $wish->ratio }}</td>
            <td>
                <a href="{{ route('wishes.edit', $wish->id) }}"><i class="fas fa-edit"></i></a>

                <form action="{{route('wishes.destroy', $wish->id)}}" method="post">
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