<footer class="footer mt-auto">
    <div class="container footer_container">
    <hr>
            <div class="d-flex justify-content-around ">
                <div class="information_footer">
                    <p class="fw-bold">Заказать еду по всей уфе</p>
                    <p>Еда в Уфе с доставкой на дом при заказе от 500р. Суши, роллы, пицца, бургеры, пироги, шашлыки и другая готовая еда. Оплата картой. Реальные отзывы. Еда за баллы.</p>
                    <div class="d-flex grid gap-5 "><img src="/img/socials1.svg"> <img src="/img/socials2.svg"> <img src="/img/socials3.svg"> </div>
                </div>
                    <div>
                        <ul class="navigation_footer">
                            <li class="fw-bold">О нас</li>
                            <li>Блюда</li>
                            <li>Заведения</li>
                            <li>Условия использования и политика конфиденциальности</li>
                        </ul>
                    </div>
                        <div>
                        <ul class="navigation_footer">
                            @guest
                            <li class="fw-bold"><a href="/auth/auth">Вход</a></li>
                            <li class="fw-bold"> <a href="/auth/registration">Регистрация</a></li>
                            @endguest

                            @auth
                            <li><a href="/users/personal_Area">Кабинет</a></li> 
                            <li><a href="/signout">Выход</a></li> 
                            @endauth
                       
                            
                        </ul>
                        </div>
            </div>
    </div>
   
</footer>
</body>
</html>