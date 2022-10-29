@extends('adminka/adminka_all')
@section('title', 'Админка')
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

    <form class="form_login_admin" method="post" action="{{route('execute_add_shop_category_product')}}" >
        @csrf
        <h1>добавить категорию продукции:</h1>

        <div class="mb-3" >
            <h5>Новая категория:</h5>
            <input type="text" class="" style="width: 305px;" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="Имя новой категории" name="name">
        </div>

        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form>
{{--......................................................................................................--}}

    <section class="form_login_admin">
        <h1>категории продукции:</h1>
        <?php
        $users_admin= \Illuminate\Support\Facades\DB::select('select * from category_product');
        foreach ($users_admin as $usr){
            echo '<form class="form_login_admin" action="execute_edit_shop_category_product" method="post">'; ?>
        @csrf  <?php
                   echo 'id:';
                   echo '<input type="text" name="id" class="inp" style="width: 105px;" value="'.$usr->id.'">';
                   echo 'login:';
                   echo '<input type="text" name="name" class="inp" style="width: 105px;" value="'.$usr->name.'">';

                   echo '<button type="submit" class="inp btn btn-primary" name="update" value="update">Изменить</button>';
                   echo '<button type="submit" class="inp btn btn-primary" name="delete" value="delete">Удалить</button>';
                   echo "<hr>";
                   echo '</form>';
               }
               ?>

    </section>
@endsection
