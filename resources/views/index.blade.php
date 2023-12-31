
<x-x-header />


    <section class="banner">
        <div class="container">
            <div class="banner_text d-flex flex-column "> 
            <h1>АППЕТИТНЫЕ ЦЕНЫ ЖДУТ ВАС!  <span>И не только!</span></h1>
          
            <a class="aaaa">Поподробнее</a>
            </div>
        </div>
    </section>
    <section class="section_cafe">
        <div class="container">
            <div class="d-flex justify-content-between cafe_text">
                <h2 class="fw-bold">Самые популярные заведения</h2>
                <a href="cafe">Перейти к заведениям <img src="/img/devices.png"></a>
            </div>
                <div class="d-flex flex-wrap grid gap-4">
                    @foreach ($cafe as $cafe_info)
                    <div class="cart_cafe g-col-4">
                        <a href=" {{route('show.r', ['id_cafe'=>$cafe_info->id])}}">
                        <img src="/storage/img/{{$cafe_info->img}}" alt="картинка заведения"> 
                        <p class="capitalize">{{$cafe_info->categoriesCafe->title_categories}} • ₽</p>
                        <a>{{$cafe_info->title}}</a>
                        </a>
                    </div>
                    @endforeach
                
                </div>
                    
        </div>
    </section>
    <section>
        <h2 class="We fw-bold" >Почему именно мы?</h2>
        <div class="container d-flex justify-content-around ">
                <div class="information_cart d-flex flex-column align-items-center">
                    <img src="/img/auto.png">
                    <h2 class="fw-bold">Быстрая доставка</h2>
                    <p class="fs-6 fw-bold">В среднем заказ уже у вас за 15 минут!</p>
                </div>
                    <div class="information_cart d-flex flex-column align-items-center">
                        <img src="/img/mdi_human-greeting-variant.png">
                        <h2 class="fw-bold">Удобства использования</h2>
                        <p class="fs-6 fw-bold">Можно заказать в любом месте и на любом устройстве!</p>
                    </div>
                        <div class="information_cart d-flex flex-column align-items-center" >
                            <img src="/img/clarity_list-solid.png">
                            <h2 class="fw-bold">Большой выбор</h2>
                            <p class="fs-6 fw-bold">На нашем сайте размещено более 100 ресторанов и кафе!</p>
                        </div>
        </div>
    </section>
        <section class="section_cafe">
        <div class="container">
            <div class="d-flex justify-content-between cafe_text">
                <h2 class="fw-bold">Самые популярные блюда</h2>
                <a href="/product">Перейти к блюдам <img src="/img/bxs_dish.png"></a>
            </div>
                <div class="d-flex flex-wrap grid gap-4">
                    @foreach ($product as $products)
                    <div class="cart_cafe cart_product g-col-4">
                    <a href="{{route ('goods.r', ['id'=>$products->id])}}">
                        <img src="/storage/img/{{$products->img}}" alt="картинка заведения"> 
                        <p>{{$products->Categories->title}}</p>
                        <a>{{$products->title}}</a>
                        <p class="fw-bold">{{$products->cost}} ₽•45 минут</p>
                        </a>
                    </div>
                    @endforeach 
                </div>
                    
        </div>
    </section>
    <section>
        <div class="container">
                <div class="d-flex align-items-center flex-column text-around">
                    <h2 class="fw-bold">По всей Уфе!</h2>
                    <p class="fw-bold">Круглосуточная доставка в любой район </p>
                </div>
                    <div class="d-flex justify-content-around">
                        <div class="cart_main_categories d-flex flex-column">
                            <h2 class="fw-bold">Доставим за час</h2>
                            <p>Привезем блюда из кафе и ресторанов</p>
                                <div class="content_main_categories d-flex flex-column grid">
                                   
                                    <div class="d-flex a_content_categories">
                                    @foreach ($categoria as $categorias)
                                    <a>{{$categorias->title}}</a>
                                    @endforeach
                                    </div>
                                  
                                        
                                                 
                                                    <div >
                                                        <a class="categories_a "href="/product" >Все категории</a>
                                                    </div>  
                                </div>
                        </div>
                            <div class="cart_main_categories">
                                 <div class="d-flex  flex-column text-around">
                                     <h2 class="fw-bold">Доставим даже на край города!</h2>
                                     <p class="">Только скажите куда </p>
                                 </div>
                                 <div class="d-flex justify-content-center">
                                 <iframe class="iframe" src="https://yandex.ru/map-widget/v1/?um=constructor%3A11744030def0a8feaad6cce670b0946d4bca01fd6116e2522927cde0288642f7&amp;source=constructor"  frameborder="0"></iframe>
                                 </div>
                            </div>
                    </div>

        </div>
    </section>
    <x-footer/>