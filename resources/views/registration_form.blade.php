@extends('all')
@section('title', 'Регистрация')

@section('content')


    <form class="form_login_admin" method="post" action="" >
        @csrf
        <h1>Зарегистрируйтесь</h1>
        <div class="mb-3" >
            <label for="formGroupExampleInput" class="form-label">Name:</label>
            <input type="text" class="form-control" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="Name" name="name">
        </div>
        <div class="mb-3" >
            <label for="formGroupExampleInput" class="form-label">Surname:</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" required minlength="3" maxlength="10" placeholder="Surname" name="surname">
        </div>
        <div class="mb-3" >
            <label for="formGroupExampleInput" class="form-label">login:</label>
            <input type="text" class="form-control" id="formGroupExampleInput3" required minlength="3" maxlength="10" placeholder="login" name="login">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">pass:</label>
            <input type="password" class="form-control" id="formGroupExampleInput4" required minlength="5" maxlength="17" placeholder="password" name="pass">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <div id="link_reg"><a href="{{route('auth_form')}}">Или войдите</a></div>
    </form>


@endsection
