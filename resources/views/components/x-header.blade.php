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


</head>
<body>
    <header>
        <div class="section_header_one d-flex justify-content-around align-items-center">
            <div class="d-flex element_header align-items-center ">
                <div>
                    <img src="img/icon.user.png" alt="иконка авторизация" class="icon_header">
                    <a href="">Вход</a>
                    <span>|</span>
                     <a href="/registration">Регистрация</a>
                    </div>
                    <form>
   <p><input type="search" name="q" placeholder="Поиск по сайту" class="search_string"> </p>
  </form>
            </div>
               
                    <div class="d-flex align-items-center element_header_two">
                            <img src="img/iconEmail.png">
                                 <span>Email:Smak23@gmail.com</span>
                            <img src="img/iconPhone.png ">
                                <span>Телефон какой-то</span>
                    </div>
        </div>
        <div class="section_header_two d-flex  justify-content-around align-items-center">
                <img src="" alt="тут есть что-то">
                    <div class="nav">
                         <ul class="d-flex">
                            <li><a>О нас</a></li>
                            <li><a>Меню</a></li>
                            <li><a>Заведения</a></li>
                            <li><a>Доставка</a></li>
                            <li><a>Стать курьером</a></li>
                            <a class="basket_input"> <img src="img/ph_basket-light.png">Корзина</a>
                         </ul> 
                                   
                    </div>
        </div>
    </header>
    @yield('content')   