@extends('all')
@section('title', 'Регистрация')
@section('menu')
    <li class="nav-item">
        <a href="{{route('auth_form')}}" class="nav-link srift">
            <img src="icons/registration_50px.png" width=25px; id="iconVHOD" alt="">Войти</a>
        @endsection
@section('content')


    <form class="form_login_reg" method="post" action="{{route('execute_form_reg')}}" >
        @csrf
        <h1>Зарегистрируйтесь</h1>
        <div class="mb-3" >
            <label for="formGroupExampleInput" class="form-label">Имя:</label>
            <input type="text" class="form-control" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="Имя" name="name">
        </div>
        <div class="mb-3" >
            <label for="formGroupExampleInput" class="form-label">Фамилия:</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" required minlength="3" maxlength="10" placeholder="Фамилия" name="surname">
        </div>
        <div class="mb-3" >
            <label for="formGroupExampleInput" class="form-label">Логин:</label>
            <input type="text" class="form-control" id="formGroupExampleInput3" required minlength="3" maxlength="10" placeholder="логин" name="login">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Пароль:</label>
            <input type="password" class="form-control" id="formGroupExampleInput4" required minlength="5" maxlength="17" placeholder="пароль" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Подтвердить</button>
        <div id="link_reg"><a href="{{route('auth_form')}}">Или войдите</a></div>
    </form>


@endsection
