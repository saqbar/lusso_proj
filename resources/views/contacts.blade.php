@extends('all')
@section('title', 'Контаты')
@section('header')
    <link rel="stylesheet" href="css/contacts.css" media="screen">
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

            <section id="secContacts" class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <h2 class="marginsCont">Наши контакты</h2>
                        <h5 class="marginsCont">Адрес:</h5>
                        <p class="marginsCont colorContGR">тут пишем адрес</p>
                        <h5 class="marginsCont">Телефон:</h5>
                        <p class="marginsCont colorContGR">тут пишем Телефон</p>
                        <h5 class="marginsCont">Электронная почта</h5>
                        <p class="marginsCont colorContGR">тут пишем почту</p>
                    </div>

                    <div class="carta col-sm">
                        <p>carta</p>
                    </div>
                </div>
            </section>



@endsection
