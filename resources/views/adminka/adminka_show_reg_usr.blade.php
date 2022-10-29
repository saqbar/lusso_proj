@extends('adminka/adminka_all')
@section('title', 'Админка')
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
    <h1>Зарегистрированные пользователи:</h1>
    <?php
    $users_admin= \Illuminate\Support\Facades\DB::select('select * from users');
    foreach ($users_admin as $usr){
        echo '<form class="form_login_admin" action="adminka_edit_reg_usr" method="post">'; ?>
    @csrf  <?php
               echo 'id:';
               echo '<input type="text" name="id" class="inp" style="width: 105px;" value="'.$usr->id.'">';
               echo 'name:';
               echo '<input type="text" name="name" class="inp" style="width: 105px;" value="'.$usr->name.'">';
               echo 'surname:';
               echo '<input type="text" name="surname" class="inp" style="width: 105px;" value="'.$usr->surname.'">';
               echo 'login:';
               echo '<input type="text" name="login" class="inp" style="width: 105px;" value="'.$usr->login.'">';
               echo 'pass:';
               echo '<input type="text" name="password" class="inp" style="width: 397px;" value="'.$usr->password.'">';
               echo 'telefon:';
               echo '<input type="text" name="telefon" class="inp" style="width: 105px;" value="'.$usr->telefon.'">';
               echo '<button type="submit" class="inp btn btn-primary" name="update" value="update">Изменить</button>';
               echo '<button type="submit" class="inp btn btn-primary" name="delete" value="delete">Удалить</button>';
               echo "<hr>";
               echo '</form>';
           }
           ?>

</section>


@endsection
