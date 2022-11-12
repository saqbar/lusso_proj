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

    <form class="form_login_admin" method="post" action="{{route('execute_add_filters')}}" >
        @csrf
        <h1>добавить имя разделов фильтра:</h1><br>

        <div class="mb-3" >
            <h5>Новая категория фильтра:</h5>
            <input type="text" class="" style="width: 305px;" id="formGroupExampleInput"  placeholder="Имя категории фильтра" name="name_categ_filt">
        </div>

        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form><br>
    <hr>

    {{--......................................................................................................--}}
    <form class="form_login_admin" method="post" action="execute_one_to_many_filters" >
        @csrf
        <h1>добавить имя подразделов фильтра:</h1><br>

        <div class="mb-3" >
            <h5>Категория:</h5>
            <select class="" aria-label="Default select example" name="name_categ_filt" style="width: 305px; text-align: center;padding: 3px;">
                <option selected name="def">выберите раздел фильтра </option>
                @foreach ($filters_category as $filter_category)
                    <option value="{{$filter_category->name_categ_filt}}" name="{{$filter_category->name_categ_filt}}">{{$filter_category->name_categ_filt}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3" >
            <h5>Новая подкатегория фильтра:</h5>
            <input type="text" class="" style="width: 305px;" id="formGroupExampleInput"  placeholder="Имя подкатегории фильтра:" name="name_one_categ">
        </div>

        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form><br>
    <hr>

    {{--......................................................................................................--}}
    <section class="form_login_admin">
        <h1>категории продукции:</h1>


        @foreach ($filters_category as $flt)
            <form class="form_login_admin" action="{{route('execute_show_one_to_many_filters')}}" method="post">
                @csrf
                id:
                <input type="text" name="id" class="inp" style="width: 105px;" value="{{$flt->id}}">
                имя разделов фильтра:
                <input type="text" name="name_categ_filt" class="inp" style="width: 105px;" value="{{$flt->name_categ_filt}}">

                <button type="submit" class="inp btn btn-primary" name="update_flt" value="update">Изменить</button>
                <button type="submit" class="inp btn btn-primary" name="delete_flt" value="delete">Удалить</button>
                <hr>
            </form>

        @endforeach

    </section>
    {{--......................................................................................................--}}

    <section class="form_login_admin">
        <h1>категории продукции:</h1>


        @foreach ($filters_one_to_many_category as $flt)
            <form class="form_login_admin" action="{{route('execute_show_one_to_many_filters')}}" method="post">
        @csrf
                   id:
                   <input type="text" name="id" class="inp" style="width: 105px;" value="{{$flt->id}}">
                   имя разделов фильтра:
                    <select class="" aria-label="Default select example" name="name_categ_filt" style="width: 305px; text-align: center;padding: 3px;">
                        <option selected name="def">{{$flt->name_categ_filt}}</option>
                        @foreach ($filters_category as $filter_category)
                            <option value="{{$filter_category->name_categ_filt}}" name="{{$filter_category->name_categ_filt}}">{{$filter_category->name_categ_filt}}</option>
                        @endforeach
                    </select>

                   имя подраздела фильтра:
                   <input type="text" name="name_one_categ" class="inp" style="width: 105px;" value="{{$flt->name_one_categ}}">

                   <button type="submit" class="inp btn btn-primary" name="update" value="update">Изменить</button>
                   <button type="submit" class="inp btn btn-primary" name="delete" value="delete">Удалить</button>
                   <hr>
                   </form>

        @endforeach

    </section>
@endsection
