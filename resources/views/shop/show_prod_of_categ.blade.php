@extends('/all')
@section('title', 'Магазин')
@section('style')
.color_filter{ color: aliceblue !important;}
@endsection
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

{{--    Начало фильтров--}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand color_filter" href="#">Фильтры:</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            {{--    выпадающий список--}}
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle color_filter" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Уход за кожей лица
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item color_filter" href="#">Очищения и тонизирования кожи лица</a></li>
                        <li><a class="dropdown-item color_filter" href="#">Уход за областью вокруг глаз</a></li>
                        <li><a class="dropdown-item color_filter" href="#">Антивозрастная косметика</a></li>
                    </ul>
                </li>
            </ul>
        {{--    выпадающий список--}}
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle color_filter" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Уход за телом
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item color_filter" href="#">Средства для тела</a></li>
                        <li><a class="dropdown-item color_filter" href="#">Антицеллюлитные средства</a></li>
                        <li><a class="dropdown-item color_filter" href="#">Средства для депиляции</a></li>
                    </ul>
                </li>
            </ul>
            {{--    выпадающий список--}}
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle color_filter" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Уход за волосами и ногтями
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item color_filter" href="#">Шампуни</a></li>
                        <li><a class="dropdown-item color_filter" href="#">Средства от перхоти</a></li>
                        <li><a class="dropdown-item color_filter" href="#">Для укрепления и профилактики выпадения волос</a></li>
                        <li><a class="dropdown-item color_filter" href="#">Средства по уходу за ногтями</a></li>
                    </ul>
                </li>
            </ul>
            {{--    выпадающий список--}}
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle color_filter" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Аромакосметика
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item color_filter" href="#">Эфирные и прочие масла</a></li>
                        <li><a class="dropdown-item color_filter" href="#">Прочая аромакосметика</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
{{--    Конец фильтров--}}
{{-------------------------------------------------------------------------------------------------}}
    <div id="wraper_card">
        @foreach($allproducts as $product)

            <a href="{{route('show_product', ['id_of_product'=>$product->id_of_product])}}" class="card">
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
