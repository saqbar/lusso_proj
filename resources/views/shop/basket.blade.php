@extends('/all')
@section('title', 'Магазин')
@section('header')
    <link rel="stylesheet" href="../public/css/shop" media="screen">
@endsection
@section('style')

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

<h2 class="spn">Заказать продукцию:</h2>
<?php
while($id_prod=current($_COOKIE)) {
    if ($id_prod == 'product'){
        foreach ($product as $products) {
            if (key($_COOKIE) == $products->id_of_product) { ?>
{{--             НАЧАЛО HTML  --}}
                <hr>
                    <p class="spn">
                    Название товара: <span style="color: red;font-size: 20px;margin: 0 20px 0 5px;">{{$products->name}}</span>
                    Обьем: <span style="color: red;font-size: 20px;margin: 0 20px 0 5px;">{{$products->volume}}</span>
                    Цена (если есть): <span style="color: red;font-size: 20px;margin: 0 20px 0 5px;">{{$products->price}}</span>
                    </p>
                    <form action="{{route('basket')}}" method="post">
                        @csrf
                        <button type="submit" name="del_cookie" value="{{$products->id_of_product}}" class="btn btn-secondary">Удалить товар</button>
                    </form>
                <hr>
{{--                 КОНЕЦ HTML--}}
<?php
            }
        }
    }
next($_COOKIE);
}
?>

<form action="{{route('comand_prod')}}" method="post">
    @csrf
    <button type="submit" name="" value="" class="btn btn-primary" style="width: 250px">Заказать</button>
</form>



@endsection
