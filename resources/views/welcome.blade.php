@extends('all')
@section('title', 'Главная')
@section('header')
    <link rel="stylesheet" href="css/welcome.css" media="screen">
    <style media="screen">
        .gos{margin: 20px;}
        .zg{margin-top: 120px !important;}
    </style>
@endsection
@section('menu')
    <li class="nav-item">
        <a href="" class="nav-link srift">
            <img src="icons/registration_50px.png" width=25px; id="iconVHOD" alt="">Войти</a>
@endsection

@section('content')
  <!-- Банер -->
<section>
<div id="banner_section">
    <div id="logo_banner">
        <h1  ><img src="images/logoW.png" alt=""></h1>
        <a href="#usl">Выбрать услугу</a>

    </div>
</div>
</section>
{{--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    --}}

 <div class="bord">
     <h1 class="" style="text-align: center;">Команда "Lusso"</h1>
     <a href="" style="text-align: center;"><h4>Отправь свое CV и найди работу мечты</h4></a>
 </div>

{{--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    --}}
            <!-- надпись наши услуги -->
<div class=" d-flex justify-content-center zg">
      <div class="usl">
          <h1 id="usl">Наши услуги</h1>
          <p>labore anim tempor nisi tamen dolore export quis minim fore malis malis fore fore cillum</p>
      </div>
</div>
{{--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    --}}
            <!-- карточки категорий -->
            <div id="wraper_card">
                <a href="" class="card">
                    <img src="images/cosmetolog.jpg" alt="" width="300" height="300" class="img-fluid">
                    <h4>Косметология</h4>
                </a>
                <a href="" class="card">
                    <img src="images/hair.jpg" alt="" width="300" height="300" class="img-fluid">
                    <h4>Волосы</h4>
                </a>
                <a href="" class="card">
                    <img src="images/g.jpg" alt="" width="300" height="300" class="img-fluid">
                    <h4>Ногти</h4>
                </a>
                <a href="" class="card">
                    <img src="images/g.jpg" alt="" width="300" height="300" class="img-fluid">
                    <h4>Брови и ресницы</h4>
                </a>
                <a href="" class="card">
                    <img src="images/g.jpg" alt="" width="300" height="300" class="img-fluid">
                    <h4>Эпиляция</h4>
                </a>
                <a href="" class="card">
                    <img src="images/g.jpg" alt="" width="300" height="300" class="img-fluid">
                    <h4>Макияж</h4>
                </a>
                <a href="" class="card">
                    <img src="images/g.jpg" alt="" width="300" height="300" class="img-fluid">
                    <h4>Свадьба</h4>
                </a>
            </div>
            <br>
            <hr>
{{--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    --}}
<h1 id="onlM" class="zg">Онлайн магазин</h1>
            <!-- Слайдер магазин -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/noname.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/noname.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/noname.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!--Конец Слайдера -->
{{--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    --}}
            <!-- почему мы -->

            <div id="Ww" class="zg">
                <h1>Почему мы</h1>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card text-center Mycard" >
                        <div class="card-body">
                            <h5 class="card-title"><img src="icons/clean30px.png" alt="">Безопасность</h5>
                            <p class="card-text">Мы соблюдаем все правила и этапы дезинфекции и стерилизации инструмента. Стерилизация инструментов</p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card text-center Mycard">
                        <div class="card-body">
                            <h5 class="card-title"><img src="icons/profesionals_30px.png" alt=""> Профессионализм персонала</h5>
                            <p class="card-text">Каждый специалист нашего центра прошел профессиональную подготовку по своей спецальности
                                и постоянно повышает свою квалификацию на семинарах и мастер-классах</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card text-center Mycard">
                        <div class="card-body">
                            <h5 class="card-title"><img src="icons/standarts_30px.png" alt="">Стандарты обслуживания</h5>
                            <p class="card-text">Мы соблюдаем протоколы процедур производителей нашего оборудования и косметики.
                                Мы неуклонно следуем рекомендациям и технологическим картам комплексных программ</p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card text-center Mycard">
                        <div class="card-body">
                            <h5 class="card-title"><img src="icons/hearts_30px.png" alt="">Доброжелательная атмосфера</h5>
                            <p class="card-text">Уютная обстановка, тактичный персонал, ароматный кофе... Вам захочется остаться!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card text-center Mycard">
                    <div class="card-body">
                        <h5 class="card-title"><img src="icons/bio_30px.png" alt="">Здоровье</h5>
                        <p class="card-text">Мы заботимся о здоровье наших клиентов и 	I используем натуральную косметику без вредных добавок и примесей</p>
                    </div>
                </div>
            </div>
{{--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    --}}


@endsection
