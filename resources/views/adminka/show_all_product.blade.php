@extends('adminka/adminka_all')
@section('title', 'Все товары')
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

    <section>
        <h1>Все товары:</h1>
        <?php
        $users_admin= \Illuminate\Support\Facades\DB::select('select * from products');
        foreach ($users_admin as $usr){
            echo '<form class="form_login_admin" action="edit_all_product" method="post">'; ?>
        @csrf  <?php
                   echo 'id:';
                   echo '<input type="text" name="id" class="inp" style="width: 105px;" value="'.$usr->id.'">';
                   echo 'category:';
                   echo '<input type="text" name="category" class="inp" style="width: 105px;" value="'.$usr->category.'">';
                   echo 'id товара:';
                   echo '<input type="text" name="id_of_product" class="inp" style="width: 105px;" value="'.$usr->id_of_product.'">';
                   echo 'название:';
                   echo '<input type="text" name="name" class="inp" style="width: 105px;" value="'.$usr->name.'">';
                   echo 'обьем:';
                   echo '<input type="text" name="volume" class="inp" style="width: 105px;" value="'.$usr->volume.'">';
                   echo 'цена:';
                   echo '<input type="text" name="price" class="inp" style="width: 105px;" value="'.$usr->price.'">';
                   echo 'описание:';
                   echo '<input type="text" name="description" class="inp" style="width: 105px;" value="'.$usr->description.'">';
                   echo '<button type="submit" class="inp btn btn-primary" name="update" value="update">Изменить</button>';
                   echo '<button type="submit" class="inp btn btn-primary" name="delete" value="delete">Удалить</button>';
                   echo "<hr>";
                   echo '</form>';
               }
               ?>

    </section>


@endsection
