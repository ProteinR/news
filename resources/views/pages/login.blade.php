@extends('layout')
@section('content')


<div class="container" id="register">
    <div class="row justify-content-center my-3">
        <div class="col-md-6 col-sm-12">
            <!-- Default form register -->
            <form class="text-center border border-light p-5">

                <p class="h4 mb-4">Вход</p>

                <!-- E-mail -->
                <input type="email" v-model="email" id="email" class="form-control mb-4" placeholder="E-mail">

                <!-- Password -->
                <input type="password" v-model="password" id="password" class="form-control" placeholder="Пароль"
                       aria-describedby="defaultRegisterFormPasswordHelpBlock">

                <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block" type="submit" v-on:click="login()">Вход</button>

            </form>
            <!-- Default form register -->
        </div>
    </div>
</div>


<script src="/js/register.js"></script>
@endsection



