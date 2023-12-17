<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="/style/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script
    src="https://code.jquery.com/jquery-2.2.4.js"
    integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>
    <script src="/script/script.js"></script>



</head>
<body>
    <header class="">
        <div class="section_header_one d-flex justify-content-between align-items-center container">
            <div class="d-flex element_header align-items-center">
                <div>
                    <img src="/img/icon.user.png" alt="иконка авторизация" class="icon_header">

                    @guest

                    <a href="/auth/auth">Вход</a>
                    <span>|</span>
                    <a href="/auth/registration">Регистрация</a>
                    @endguest

                    @auth
                    @if (Auth::user()->id_role == 2)

                    <a href="/moder/serviceEdit">Панель Модератора</a>
                    <span>|</span>
                    <a href="/signout">Выход</a>
                    @else
                    <a href="/users/personal_Area">Кабинет</a>
                    <span>|</span>
                    <a href="/signout">Выход</a>
                    @endif


                    @endauth
                    </div>
                    <!-- <form>
   <p><input type="search" name="q" placeholder="Поиск по сайту" class="search_string"> </p>
  </form> -->
            </div>
                    <div class="d-flex align-items-center element_header_two">
                            <img src="/img/iconEmail.png" alt="иконка почты">
                                 <span>Email:Smak23@gmail.com</span>
                            <img src="/img/iconPhone.png " alt="иконка телефона">
                                <span>Телефон какой-то</span>
                    </div>
        </div>

        <div class="section_header_two d-flex">
            <div class="container d-flex justify-content-between align-items-center">
        <a href="/">
                <img src="/img/logo.jpg" alt="тут есть что-то" class="logo">
        </a>
                    <div class="nav">
                         <ul class="d-flex">
                            <li><a href="/">О нас</a></li>
                            <li><a href="/product">Меню</a></li>
                            <li><a href="/cafe">Заведения</a></li>
                            <a class="basket_input" href="/baskets"> <img src="/img/ph_basket-light.png">Корзина</a>
                         </ul>

                    </div>
                    </div>
        </div>
    </header>
    @yield('content')
