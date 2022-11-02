@extends('adminka/adminka_all')
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
    <h5><a href="{{route('add_user')}}">добавление польз в админку</a></h5>
    <h5><a href="{{route('adminka_show_reg_usr')}}">пользователи</a></h5>
    <h5><a href="{{route('add_shop_category_product')}}">добавить бренд продукции</a></h5>
    <h5><a href="{{route('add_shop_product')}}">добавить продукцию</a></h5>
    <h5><a href="{{route('show_all_product')}}">Все товары</a></h5>
    <h5><a href="{{route('show_orders')}}">Заказы</a></h5>
</div>
@endsection
