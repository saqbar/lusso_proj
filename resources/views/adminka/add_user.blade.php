@extends('adminka/adminka_all')
@section('title', 'добавление пользователя в админку')
@section('style')
    .form_login_admin{ text-align: center; margin-top:20px; margin-bottom:30px;}
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

<form class="form_login_admin" method="post" action="{{route('execute_add_user')}}" >
    @csrf
    <h1>добавление пользователя в админку:</h1>
    <div class="mb-3" >
        <h5>Логин:</h5>
        <input type="text" class="" style="width: 305px;" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="логин" name="login">
    </div>
    <div class="mb-3 inp">
        <h5>Пароль:</h5>
        <input type="password" class=" " style="width: 305px;" id="formGroupExampleInput2" required minlength="5" maxlength="17" placeholder="пароль" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Подтвердить</button>
</form>


<section class="form_login_admin">
    <h1>Пользователи админки:</h1>
<?php
$users_admin= \Illuminate\Support\Facades\DB::select('select * from admin_users');
foreach ($users_admin as $usr){
    echo '<form class="form_login_admin" action="edit_add_user" method="post">'; ?>
    @csrf  <?php
    echo 'id:';
    echo '<input type="text" name="id" class="inp" style="width: 105px;" value="'.$usr->id.'">';
    echo 'login:';
    echo '<input type="text" name="login" class="inp" style="width: 105px;" value="'.$usr->login.'">';
    echo 'pass:';
    echo '<input type="text" name="password" class="inp" style="width: 397px;" value="'.$usr->password.'">';
    echo '<button type="submit" class="inp btn btn-primary" name="update" value="update">Изменить</button>';
    echo '<button type="submit" class="inp btn btn-primary" name="delete" value="delete">Удалить</button>';
    echo "<hr>";
    echo '</form>';
}
?>

</section>

@endsection





