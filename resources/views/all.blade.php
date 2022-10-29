<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lusso: @yield('title')</title>

    <link rel="stylesheet" href="css\all.css" type="text/css">
    <!-- bootstrap@ 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- end bootstrap@ 5.2 -->

    <!-- шрифты -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4&display=swap" rel="stylesheet">

{{--    <link rel="stylesheet" href="nicepage.css" media="screen">--}}


    <style media="screen">
        body{font-family: 'Source Serif 4', sans-serif;}
        /* нопка наверх */
        #myBtn {
            display: none; /* Hidden by default */
            position: fixed; /* Fixed/sticky position */
            bottom: 20px; /* Place the button at the bottom of the page */
            right: 30px; /* Place the button 30px from the right */
            z-index: 99; /* Make sure it does not overlap */
            border: none; /* Remove borders */
            outline: none; /* Remove outline */

            color: white; /* Text color */
            cursor: pointer; /* Add a mouse pointer on hover */
            padding: 15px; /* Some padding */

            font-size: 18px; /* Increase font size */
        }

        #amyBtn:hover {
            background-color: #333333; /* Add a dark-grey background on hover */
        }
        #iconVHOD{margin-right: 5px;}
    </style>
    @yield('header')


</header>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a href="{{route('home')}}" class="navbar-brad"><img class="logo" src="images/logo.png"></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive" type="button" name="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="{{route('home')}}#usl" class="nav-link srift">Наши услуги</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('shop')}}" class="nav-link srift">Магазин</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('about')}}" class="nav-link srift">О нас</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('contacts')}}" class="nav-link">Контакты</a>
                </li>
                @yield('basket')
                @yield('menu')
                <?php
                    if(\Illuminate\Support\Facades\Auth::user()) {              // проверяем аутент ли мы
                        $user = \Illuminate\Support\Facades\Auth::user();       // получаем login auth
                        $db_users = \Illuminate\Support\Facades\DB::select('select * from admin_users'); // login из БД
                        foreach ($db_users as $usr) {
                            if($usr->login==$user['login']){                // если auth = login из БД admin_users
                                echo '<a href="/public/adminka" class="nav-link">Админка</a>';
                            }
                        }
                    }?>
                <li class="nav-item ro">
                    <a href="#" class="nav-link">RO</a>
                </li>
            </ul>
        </div>

    </div>
</nav>


@yield('content')

<!-- footer -->
<footer class="footer">

    <div class="sotseti">
        <h3 class="footerColor">Социальные сети:</h3>
        <div class="sotS">
            <img src="icons/instagram.png" width="32" height="32"alt="">
            <a href="#">instagram</a>
        </div>
        <div class="">
            <img src="icons/facebook.png" width="32" height="32"alt="">
            <a href="#">facebook</a>
        </div>

    </div>

    <div class="categUsl">
        <h3 class="footerColor">Услуги:</h3>
        <a href="#" class="footerColor">Косметология</a>
        <a href="#" class="footerColor">Волосы</a>
        <a href="#" class="footerColor">Ногти</a>
        <a href="#" class="footerColor">Брови и ресницы</a>
        <a href="#" class="footerColor">Эпиляция</a>
        <a href="#" class="footerColor">Макияж</a>
        <a href="#" class="footerColor">Свадьба</a>

    </div>

</footer>

<!-- end footer -->

<!-- кнопка наверх -->


<a id="myBtn" href="#" onclick="topFunction(); return false;">
    <img src="images/up.png" alt="Top" border="none" title="Наверх">
</a>

<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>

@yield('afterfooter')
<!-- bootstrap@ 5.2 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<!-- end bootstrap@ 5.2 -->
</body>
</html>
