@extends('all')
@section('title', 'Админка')
@section('menu')
    <?php
    if(\Illuminate\Support\Facades\Auth::check()){
        echo '<li class="nav-item">';
        echo '<a href="/public/logout"class="nav-link srift">';
        echo '<img src="icons/registration_50px.png" width=25px; id="iconVHOD" alt="">Выйти из учетной записи</a>';

    }else{
        echo '<li class="nav-item">';
        echo '<a href="/public/auth"class="nav-link srift">';
        echo '<img src="icons/registration_50px.png" width=25px; id="iconVHOD" alt="">Войти</a>';}
    ?>
@endsection

@section('content')
<div>
    <h3><a href="{{route('add_user')}}">добавление польз в админку</a></h3>
</div>
@endsection
