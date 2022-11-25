@extends('/all')
@section('title', 'Магазин')
@section('style')
    .color_filter{ color: aliceblue !important;}
@endsection
@section('header')
    <link rel="stylesheet" href="../public/css/shop.css" media="screen">
    <link rel="stylesheet" href="../public/css/welcome.css" media="screen">
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

                @if(isset($filters_category))
                    @foreach($filters_category as $filter)
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle color_filter" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{$filter->name_categ_filt}}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    @foreach($filters_one_to_many_category as $one_to_many)
                                        @if($filter->name_categ_filt=== $one_to_many->name_categ_filt)
                                            <li><a class="dropdown-item color_filter" href="{{route('show_filt_of_categ',['f'=>$one_to_many->id])}}">{{$one_to_many->name_one_categ}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    @endforeach
                @else <p>укажите фильтр в админке </p>
                @endif

            </div>
        </div>
    </nav>
    <br>
    {{--    Конец фильтров--}}
    {{-------------------------------------------------------------------------------------------------}}
    <div id="wraper_card">
        @if(isset($f_of_pr))
           @foreach($f_of_pr as $i)


            <a href="{{route('show_product', ['id_of_product'=>$i->id_of_product])}}" class="card">
                <img src="../public/images/g.jpg" alt="" width="300" height="300" class="img-fluid">
                <h4>{{ $i->name }}</h4>
                @if($i->volume)
                    <p>Обьем: {{$i->volume}}</p>
                @endif
                @if($i->price)
                    <p>Цена: {{$i->price}}</p>
                @endif
            </a>
            @endforeach
        @endif
    </div>

@endsection
