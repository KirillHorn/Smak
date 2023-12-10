
<x-x-header />
    <section class="">
      <div class="container">
        <div class="d-flex nav_goods align-items-center gap-3">
            <img src="/img/mdi_food-ramen.svg" alt="Тут">
            <p>{{$cafe_id->title}} откроются в 10:00</p>
        </div>
      </div>
    </section>
    <section class=" ">
        <div class="container">
                <div class="information_cafe_main d-flex "> 
                    <div class="information_cafe_main_one d-flex flex-column gap-3">
                      <div class="information_cafe_main_one_fon d-flex align-items-end gap-3">
                          <p class="fs-1 fw-bold" >Суши Мигом</p>
                          <button  class="heart">
                            <!-- <div class="heart">

                            </div> -->
                          </button>
                      </div>
                        <input type="search" class="search_content search_goods">
                        </div>
                        <iframe class="iframe_goods" src="https://yandex.ru/map-widget/v1/?um=constructor%3A11744030def0a8feaad6cce670b0946d4bca01fd6116e2522927cde0288642f7&amp;source=constructor"  frameborder="0"></iframe>
                </div>

                <div class="information_cafe_product d-flex">
                    <div class="cafe_product">
                                <div class="">
                                    <h2 class="fw-bold">Популярное</h2>
                                    <div class="d-flex flex-wrap grid gap-4 ">
                                         <div class="cafe_product_info cart_cafe g-col-4">
                                            <img src="/img/66e1608c038e458e7185685a45251707.jpg" alt="картинка заведения"> 
                                             <p>Азиатска кухня • ₽</p>
                                            <a>Рамен горящего города</a>
                                        <p class="fw-bold">190 ₽•45 минут</p>
                                      </div>
                                      <div class="cafe_product_info cart_cafe g-col-4">
                                            <img src="/img/66e1608c038e458e7185685a45251707.jpg" alt="картинка заведения"> 
                                             <p>Азиатска кухня • ₽</p>
                                            <a>Рамен горящего города</a>
                                        <p class="fw-bold">190 ₽•45 минут</p>
                                      </div>
                                      <div class="cafe_product_info cart_cafe g-col-4">
                                            <img src="/img/66e1608c038e458e7185685a45251707.jpg" alt="картинка заведения"> 
                                             <p>Азиатска кухня • ₽</p>
                                            <a>Рамен горящего города</a>
                                        <p class="fw-bold">190 ₽•45 минут</p>
                                      </div>
                                    </div>
                                </div>

                                <div class="">
                                    <h2 class="fw-bold">Завтрак</h2>
                                    <div class="d-flex flex-wrap grid gap-4 ">
                                         <div class="cafe_product_info cart_cafe g-col-4" id="part1">
                                            <img src="/img/66e1608c038e458e7185685a45251707.jpg" alt="картинка заведения"> 
                                             <p>Азиатска кухня • ₽</p>
                                            <a>Рамен горящего города</a>
                                        <p class="fw-bold">190 ₽•45 минут</p>
                                      </div>
                                      <div class="cafe_product_info cart_cafe g-col-4">
                                            <img src="/img/66e1608c038e458e7185685a45251707.jpg" alt="картинка заведения"> 
                                             <p>Азиатска кухня • ₽</p>
                                            <a>Рамен горящего города</a>
                                        <p class="fw-bold">190 ₽•45 минут</p>
                                      </div>
                                      <div class="cafe_product_info cart_cafe g-col-4">
                                            <img src="/img/66e1608c038e458e7185685a45251707.jpg" alt="картинка заведения"> 
                                             <p>Азиатска кухня • ₽</p>
                                            <a>Рамен горящего города</a>
                                        <p class="fw-bold">190 ₽•45 минут</p>
                                      </div>
                                    </div>
                                </div>

                                <div class="">
                                    <h2 class="fw-bold">Обед</h2>
                                    <div class="d-flex flex-wrap grid gap-4 ">
                                         <div class="cafe_product_info cart_cafe g-col-4">
                                            <img src="/img/66e1608c038e458e7185685a45251707.jpg" alt="картинка заведения"> 
                                             <p>Азиатска кухня • ₽</p>
                                            <a>Рамен горящего города</a>
                                        <p class="fw-bold">190 ₽•45 минут</p>
                                      </div>
                                      <div class="cafe_product_info cart_cafe g-col-4">
                                            <img src="/img/66e1608c038e458e7185685a45251707.jpg" alt="картинка заведения"> 
                                             <p>Азиатска кухня • ₽</p>
                                            <a>Рамен горящего города</a>
                                        <p class="fw-bold">190 ₽•45 минут</p>
                                      </div>
                                      <div class="cafe_product_info cart_cafe g-col-4">
                                            <img src="/img/66e1608c038e458e7185685a45251707.jpg" alt="картинка заведения"> 
                                             <p>Азиатска кухня • ₽</p>
                                            <a>Рамен горящего города</a>
                                        <p class="fw-bold">190 ₽•45 минут</p>
                                      </div>
                                    </div>
                                </div>

                        </div>
                        <div class="cafe_product_navigation ">
                          <ul class="">
                          <a href="#part1"><li>Популярные</li></a>
                            <li>Завтрак</li>
                            <li> Обед</li>
                            <li>Напитки</li>
                            <li>Горячие блюда</li>
                            <li>Салат</li>
                          </ul>
                        </div>
        </div>
    </section>
       
   
    <x-footer/>
    <script src="script/script.js"></script>