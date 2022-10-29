@extends('adminka/adminka_all')
@section('title', 'add_shop_product')
@section('style')
    .form_login_admin{ text-align: center; margin 20px;}
    .inp {margin: 15px; text-align: center;}
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
    <form class="form_login_admin" method="post" action="{{route('execute_add_shop_product')}}" >
        @csrf
        <h1>добавление товара:</h1>

        <div class="mb-3" >
            <h5>Категория:</h5>
            <input type="text" class="" style="width: 305px;" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="категория" name="category">
        </div>
        <div class="mb-3" >
            <h5>id продукта:</h5>
            <input type="text" class="" style="width: 305px;" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="id продукта" name="id_of_product">
        </div>
        <div class="mb-3" >
            <h5>Название:</h5>
            <input type="text" class="" style="width: 305px;" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="название" name="name">
        </div>
        <div class="mb-3" >
            <h5>Обьем:</h5>
            <input type="text" class="" style="width: 305px;" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="обьем" name="volume">
        </div>
        <div class="mb-3" >
            <h5>Цена:</h5>
            <input type="text" class="" style="width: 305px;" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="цена" name="price">
        </div>
        <div class="mb-3" >
            <h5>Описание:</h5>
            <div class="form-floating" >
                <textarea class="form-control" placeholder="Описание товара" id="floatingTextarea" name="description"></textarea>
                <label for="floatingTextarea">Описание товара</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form>

@endsection
