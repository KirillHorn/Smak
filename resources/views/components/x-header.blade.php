<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/style/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link href="/style/style.css" rel="stylesheet">
  <script src="/script/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="/script/bootstrap.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
  <style>
 #charCount.red {
    color: red;
  }
</style>
</head>
<body style="min-height: 100vh;" class="d-flex flex-column">
  <nav class="navbar navbar-expand-lg header">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMAK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
 
<div class="navbar-collapse collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="/">О нас</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/product">Меню</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cafe">Заведение</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav-link-dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Сотрудничество
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/application">Регистрация заведения</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/application_courier">Стать курьером</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex search_form" role="search" method="GET" action="/search">
        <input class="form-control me-2 search" type="search" name="search" placeholder="Поиск..." aria-label="Search">
        <button class="btn btn-seach search_input_header" type="submit">Поиск</button>
      </form>
      <a class="basket_input" href="/baskets">   <span class="icon-button"></span> Корзина</a>
  <ul class="nav">
        @guest
        <li class="nav-item"><a href="/auth/auth" class="nav-link px-2">Вход</a></li>
        <span style="color: aliceblue;">|</span>
        <li class="nav-item"><a href="/auth/registration" class="nav-link px-2">Регистрация</a></li>
        @endguest
        @auth
        @if (Auth::user()->id_role == 1)
        <li class="nav-item"><a href="/users/personal_Area" class="nav-link px-2">Личный кабинет</a></li>
        @elseif (Auth::user()->id_role == 3)
        <li class="nav-item"><a href="/courier/personal_Area" class="nav-link px-2">Личный кабинет</a></li>
        @endif
        <span>|</span>
        <li class="nav-item"><a href="/signout" class="nav-link px-2">Выход</a></li>
        @endauth
      </ul>
    </div>
    </div>
  </div>
</nav>





