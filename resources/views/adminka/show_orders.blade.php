@extends('adminka/adminka_all')
@section('title', 'Мои заказы')
@section('style')
    .inp{margin: 15px; text-align: center;}
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

    <section style="margin-left: 20px">
        <h1>Мои заказы:</h1>
        @foreach($orders as $order)
            <form class="form_login_admin" action="show_orders" method="post">
                @csrf
                id:
                <input type="text" name="id" class="inp" style="width: 105px;" value="{{$order->id}}">
                Имя заказчика:
                <input type="text" name="name" class="inp" style="width: 105px;" value="{{$order->name}}">
                Фамилия заказчика
                <input type="text" name="surname" class="inp" style="width: 105px;" value="{{$order->surname}}">
                телефон заказчика
                <input type="text" name="telefon" class="inp" style="width: 105px;" value="{{$order->telefon}}">
                id товара:
                <input type="text" name="id_of_product" class="inp" style="width: 105px;" value="{{$order->id_of_product}}">
                название товара:
                <input type="text" name="name_of_prod" class="inp" style="width: 105px;" value="{{$order->name_of_prod}}">
                обьем товара:
                <input type="text" name="volume_of_prod" class="inp" style="width: 105px;" value="{{$order->volume_of_prod}}">
                цена товара:
                <input type="text" name="price_of_prod" class="inp" style="width: 105px;" value="{{$order->price_of_prod}}">
                <button type="submit" class="inp btn btn-primary" name="update" value="update">Изменить</button>
                <button type="submit" class="inp btn btn-primary" name="delete" value="delete">Удалить</button>
            </form>
        @endforeach
    </section>

@endsection
