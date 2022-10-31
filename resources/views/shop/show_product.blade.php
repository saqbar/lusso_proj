@extends('/all')
@section('header')
{{--    <link rel="stylesheet" href="css/shop.css" media="screen">--}}
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
    @foreach($prod as $product)
    <div style="margin-left: 15px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('shop')}}">Магазин</a></li>
                <li class="breadcrumb-item"><a href="{{route('show_prod_of_categ',['category'=>$product->category])}}">{{$product->category}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
            </ol>
        </nav>
    </div>


<section>
    <div class="card mb-3" >
        <div class="row g-0">
            <div class="col-md-4">
                <img src="images/g.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title">{{$product->name}}</h1>
                    <p class="card-text">Бренд:  {{$product->category}}</p>
                    <p class="card-text">Обьем:  {{$product->volume}}</p>
                    <h4 class="card-text">Цена:  {{$product->price}}</h4>
                    <p class="card-text">Описание:  {{$product->description}}</p><br>
                    <form action="" method="post">
                        @csrf
                    <button class="btn btn-secondary" type="submit" onclick="alert('товар добавлен в корзину')" name="id_prod" value="{{$product->id_of_product}}">Добавить в корзину</button>
                    </form>
{{--                    onclick="alert('товар добавлен в корзину')"--}}
                </div>
            </div>
        </div>
    </div>
</section>


@endforeach
@endsection
