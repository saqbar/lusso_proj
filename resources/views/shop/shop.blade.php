@extends('all')
@section('title', 'Магазин')
@section('header')
    <link rel="stylesheet" href="css/shop.css" media="screen">
    <link rel="stylesheet" href="css/welcome.css" media="screen">
@endsection

@section('basket')
    <li class="nav-item">
        <a href="{{'basket'}}" class="nav-link srift">
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

            <section id="grayfonall">

                <div id="fontext">
                    <h1>Lusso Beauty Shop</h1><br>
                    <h6>Мы крайне серьёзно подошли к тому, что Вам предложить. Ведь гости нашего салона достойной исключительно лучшего!
                        Каждый из представленных средств является одним из топовых в своём сегменте.
                    </h6>
                    <h6>
                        Качественная селекция профессиональных косметических уходовых средств,  Проверенная годами работы нашими мастерами,
                        Идеально подобранная именно для Вас...
                    </h6><br><br>
                    <a href="#" >Перейти в каталог </a>
                </div>
            </section>
            <br>


            <div id="wraper_card">
                @foreach($allcategory as $category)

                    <a href="{{route('show_prod_of_categ', ['category'=>$category->name])}}" class="card">
                        <img src="images/g.jpg" alt="" width="300" height="300" class="img-fluid">
                        <h4>{{ $category->name }}</h4>
                    </a>
                @endforeach
            </div>












@endsection
