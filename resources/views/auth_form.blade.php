@extends('all')
@section('title', 'Аутентификация')
@section('header')
    <style>
        .form_login_admin{ text-align: center}
    </style>
@endsection
@section('menu')
    <li class="nav-item">
        <a href="{{route('registration_form')}}" class="nav-link srift">
            <img src="icons/registration_50px.png" width=25px; id="iconVHOD" alt="">Регистрация</a>
@endsection

@section('content')
<form class="form_login_admin" method="post" action="{{route('execute_form_auth')}}" >
    @csrf
    <h1>Вход:</h1>
    <div class="mb-3" >
        <label for="formGroupExampleInput" class="form-label">Логин:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="логин" name="login">
        @error('login')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Пароль:</label>
        <input type="password" class="form-control" id="formGroupExampleInput2" required minlength="5" maxlength="17" placeholder="пароль" name="password">
        @error('password')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Подтвердить</button>
    <div id="link_reg"><a href="{{route('registration_form')}}">регистрация</a></div>

</form>

@endsection
