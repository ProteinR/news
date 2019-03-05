@extends('layout')
@section('content')


<div class="container" id="register" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="row justify-content-center my-3">
        <div class="col-md-6 col-sm-12">
            <!-- Default form register -->
            <form class="text-center border border-light p-5">

                <p class="h4 mb-4">Регистрация</p>

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- First name -->
                        <input type="text" v-model="name" id="name" class="form-control" placeholder="Имя">
                    </div>
                </div>

                <!-- E-mail -->
                <input type="email" v-model="email" id="email" class="form-control mb-4" placeholder="E-mail">

                <!-- Password -->
                <input type="password" v-model="password" id="password" class="form-control" placeholder="Пароль"
                       aria-describedby="defaultRegisterFormPasswordHelpBlock">
                <small id="" class="form-text text-muted mb-4">
                    Как минимум 6 символов
                </small>

                <!-- Password -->
                <input type="password" v-model="password_confirmation" id="password_confirmation" class="form-control
                mb-4"
                       placeholder="Пароль" aria-describedby="defaultRegisterFormPasswordHelpBlock">

                <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block" type="submit" v-on:click="register()">Регистрация</button>

                <!-- Terms of service -->
                <p>By clicking
                    <em>Sign up</em> you agree to our
                    <a href="" target="_blank">terms of service</a>

            </form>
            <!-- Default form register -->
        </div>
    </div>
</div>


<script src="/js/register.js"></script>
@endsection



