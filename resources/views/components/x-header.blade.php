<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="/style/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="/script/script.js"></script>



</head>

<body style="min-height: 102vh;" class="d-flex flex-column">
<header class="py-3  border-bottom">
    <div class="container d-flex flex-wrap justify-content-center gap-3">
      <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
      <img src="/img/" alt="тут есть что-то" class="logo">
      </a>
      <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
        <input type="search" class="form-control search_input" placeholder="Поиск..." aria-label="Search">
      </form>
      <a class="basket_input" href="/baskets">   <span class="icon-button"></span>
  Корзина</a>
    </div>
  </header>
<nav class="py-2 ">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <li class="nav-item"><a href="#" class="nav-link px-2" aria-current="page">О нас</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Меню</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Заведение</a></li>
        <li class="nav-item"><a href="#" class="nav-link  px-2">Стать курьером</a></li>
      </ul>
      <ul class="nav">
        @guest
        <li class="nav-item"><a href="/auth/auth" class="nav-link px-2">Вход</a></li>
        <span>|</span>
        <li class="nav-item"><a href="/auth/registration" class="nav-link px-2">Регистрация</a></li>
        @endguest
        @auth
        <li class="nav-item"><a href="/users/personal_Area" class="nav-link px-2">Личный кабинет</a></li>
        <span>|</span>
        <li class="nav-item"><a href="/signout" class="nav-link px-2">Выход</a></li>
        @endauth
      </ul>
    </div>
  </nav>
 
    @yield('content')