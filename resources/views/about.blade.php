@extends('all')
@section('title', 'О нас')
@section('header')
    <link rel="stylesheet" href="css/about.css" media="screen">
@endsection

@section('menu')
    <li class="nav-item">
        <a href="{{route('auth_form')}}" class="nav-link srift">
            <img src="icons/registration_50px.png" width=25px; id="iconVHOD" alt="">Войти</a>
@endsection
@section('content')
<section id="grayfonall">
    <div id="fontext">
        <h1 class="fontextP">Вакансии</h1>
        <p class="fontextP fonttextPP">Мы находимся в постоянном поиске талантов, если у вас есть опыт работы
            в салонах красоты или косметологических клиниках премиум-класса, обязательно подтвержденный портфолио,
            вы умеете работать в команде и обладаете личной ответственностью, заполните форму ниже:
        </p>
    </div>
</section><br>

{{--  /*/////////////////////////////////////////////////////////////////////////////////////////////*/--}}

            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Ваше имя</label>
                    <input type="text" class="form-control"  id="exampleInputName1" name="name">
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputTel1">Телефон</label>
                    <input type="text" class="form-control" id="exampleInputTel1" name="telefon">
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputPoz1">Интересующая позиция</label>
                    <input type="text" class="form-control" id="exampleInputPoz1" name="vacancy">
                </div>
                <br>
                <div class="form-group">
                    <label for="" >Прикрепите файл с вашим портфолио</label><br>
                    <input type="file" class="btn btn-outline-secondary" name="portfolio"></input>
                </div>
                <br>
                <button type="submit" class="btn btn-secondary" id="exampleInputSub1">Отправить</button>
            </form><br>
            <p class="text-muted">Нажимая на кнопку, вы даете согласие
                на обработку персональных данных и соглашаетесь c политикой конфиденциальности</p>
            <br>

            <div class="sect">
                <h2 class="sectCol">Наша главная задача - предоставлять лучший бьюти-сервис.</h2>
                <p class="sectP sectCol">Мы не ищем компромиссов в вопросе качества оказания услуг на всех этапах
                    взаимодействия клиентов с LUSSO Salon, начиная от записи на услугу и заканчивая рекомендациями
                    средств по уходу. Нам важно, чтобы нас могли рекомендовать своим близким и возвращаться к нам снова и снова.
                </p>
            </div>

@endsection()
