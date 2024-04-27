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
<!-- <header class="py-3  border-bottom">
    <div class="container d-flex flex-wrap justify-content-center gap-3">
      <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-decoration-none" style="color: aliceblue; font-size:30px; margin-left:60px;">
      SMAK
      </a>
     
  </header>
<nav class="py-2 ">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <li class="nav-item"><a href="/" class="nav-link px-2" aria-current="page">О нас</a></li>
        <li class="nav-item"><a href="" class="nav-link px-2">Меню</a></li>
        <li class="nav-item"><a href="" class="nav-link px-2">Заведение</a></li>
        <li class="nav-item"><a href="" class="nav-link px-2">Добавить заведение</a></li>
      </ul>
      
    </div>
  </nav> -->

  <nav class="navbar navbar-expand-lg header">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMAK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
            <li><a class="dropdown-item" href="#">Стать курьером</a></li>
          </ul>
        </li>
      </ul>
 
      <form class="d-flex" role="search">
        <input class="form-control me-2 search" type="search" placeholder="Поиск..." aria-label="Search">
        <button class="btn btn-seach search_input_header" type="submit">Поиск</button>
      </form>
      <a class="basket_input" href="/baskets">   <span class="icon-button"></span>
  Корзина</a>
  <ul class="nav">
        @guest
        <li class="nav-item"><a href="/auth/auth" class="nav-link px-2">Вход</a></li>
        <span style="color: aliceblue;">|</span>
        <li class="nav-item"><a href="/auth/registration" class="nav-link px-2">Регистрация</a></li>
        @endguest
        @auth
        <li class="nav-item"><a href="/users/personal_Area" class="nav-link px-2">Личный кабинет</a></li>
        <span>|</span>
        <li class="nav-item"><a href="/signout" class="nav-link px-2">Выход</a></li>
        @endauth
      </ul>
    </div>
     
    </div>
  </div>
</nav>
 
    @yield('content')