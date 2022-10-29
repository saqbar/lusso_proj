@extends('all')
@section('title', 'Главная')
@section('menu')
    <?php
    if(\Illuminate\Support\Facades\Auth::check()){
        echo '<li class="nav-item">';
        echo '<a href="/public/logout"class="nav-link srift">';
        echo '<img src="icons/registration_50px.png" width=25px; id="iconVHOD" alt="">Выйти из учетной записи</a></li>';
    }else{
        echo '<li class="nav-item">';
        echo '<a href="/public/auth"class="nav-link srift">';
        echo '<img src="icons/registration_50px.png" width=25px; id="iconVHOD" alt="">Войти</a></li>';}
    ?>
@endsection
@section('content')
<h1><a href="{{'logout'}}" style="color: red;">ДЕАВТОРИЗИРОВАТЬСЯ</a></h1>
@endsection
