@extends('all')
@section('title', 'Магазин')
@section('header')
    <link rel="stylesheet" href="css/shop.css" media="screen">
    <link rel="stylesheet" href="css/welcome.css" media="screen">
@endsection

@section('basket')
    <li class="nav-item">
        <a href="" class="nav-link srift">
            <img src="icons/shopping_bag_50px.png" width=25px; id="iconVHOD" alt="">Корзина</a></li>
@endsection

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


    <div id="wraper_card">
        @foreach($allproducts as $product)

            <a href="{{route('show_product', $product->id_of_product)}}" class="card">
                <img src="images/g.jpg" alt="" width="300" height="300" class="img-fluid">
                <h4>{{ $product->name }}</h4>
                @if($product->volume)
                    <p>Обьем: {{$product->volume}}</p>
                @endif
                @if($product->price)
                    <p>Цена: {{$product->price}}</p>
                @endif
            </a>
        @endforeach
    </div>

@endsection
