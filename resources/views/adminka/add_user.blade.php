<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add_user</title>

    <link rel="stylesheet" href="" type="text/css">
    <!-- bootstrap@ 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- end bootstrap@ 5.2 -->
    <style>
        .form_login_admin{ text-align: center}
    </style>
</head>
<body>
<form class="form_login_admin" method="post" action="{{route('execute_add_user')}}" >
    @csrf
    <h1>добавление пользователя в админку:</h1>
    <div class="mb-3" >
        <label for="formGroupExampleInput" class="form-label">Логин:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="логин" name="login">

    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Пароль:</label>
        <input type="password" class="form-control" id="formGroupExampleInput2" required minlength="5" maxlength="17" placeholder="пароль" name="password">

    </div>
    <button type="submit" class="btn btn-primary">Подтвердить</button>


</form>



<!-- bootstrap@ 5.2 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<!-- end bootstrap@ 5.2 -->
</body>
</html>





