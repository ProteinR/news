@extends('layout')

@section('content')


    <form method="post" action="{{ route('wishes.update', $wish->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="wishName">Wish</label>
            <input type="text" class="form-control" id="wishName" name="name" placeholder="Input your wish" value="{{ $wish->name }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">How you need it</label>
            <input type="text" class="form-control" id="need" name="need" placeholder="Need" value="{{ $wish->need }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">How you want it</label>
            <input type="text" class="form-control" id="want" name="want" placeholder="Want" value="{{ $wish->want }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Price</label>
            <input type="text" class="form-control" id="need" name="price" placeholder="Price" value="{{ $wish->price }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Ratio</label>
            <input type="text" class="form-control" id="ratio" name="ratio" placeholder="Ratio" value="{{ $wish->ratio }}">
        </div>
        <input type="submit" value="Save" class="btn btn-primary">
    </form>
@endsection