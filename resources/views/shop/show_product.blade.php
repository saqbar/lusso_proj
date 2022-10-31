@extends('/all')
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
    @foreach($prod as $product)

<h1>{{$product->name}}</h1>



    @endforeach
@endsection
