
<x-x-header/>


    <section class="banner">
        <div class="container">
            <div class="banner_text d-flex flex-column "> 
            <h1>АППЕТИТНЫЕ ЦЕНЫ ЖДУТ ВАС!<span>И не только!</span></h1>
          
            <a class="aaaa" href="{{ route('products', ['sort_order' => '0']) }}">Поподробнее</a>
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
                <a href="{{ route('products', ['sort_order' => '0']) }}">Перейти к блюдам <img src="/img/bxs_dish.png"></a>
            </div>
            <div class="d-flex d-flex  justify-content-between flex-wrap gap-3 cafe">
            @foreach ($product as $products)
            <div class="cart_cafe cart_product cart_product_text">
                <a href="{{route ('goods.r', ['id'=>$products->id])}}">
                    <img src="/storage/img/{{$products->img}}" alt="картинка заведения">
                    <p style="color: #ffffff;">{{$products->Categories->title}}</p>
                    <p style="color: #ffffff;" class="fw-bolder">{{$products->title}}</p>
                    <p style="color: #ffffff;" class="fw-bold">{{$products->cost}}₽</p>
                </a>
            </div>
            @endforeach
        </div>
                    
        </div>
    </section>
    <section>
        <div class="container">
                <div class="d-flex align-items-center justify-content-between flex-wrap text-around mt-5 categories_container">
                    <div class="categories_block p-5 d-flex flex-column ">
                        <h3>Любые категории блюд</h3>
                        <p>Привезём блюда из любого филиала</p>
                            <div class="categories_link d-flex flex-wrap gap-3 mb-3">
                                @foreach($categoria as $categories_product)
                                <a href="{{ route ('products',  ['sort_order' => $categories_product->id]) }}" >{{$categories_product->title}}</a>   
                                @endforeach
                            </div>
                            <a href="{{ route('products', ['sort_order' => '0']) }}" class="mt-1 all_categories"  >Все блюда</a>
                    </div>
          

                <div style="position:relative;overflow:hidden;" class="map_main"><a href="https://yandex.ru/maps/172/ufa/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Уфа</a><a href="https://yandex.ru/maps/172/ufa/house/ulitsa_tsyurupy_97k3/YUwYfwJnT0MAQFtufXtyd3lnYQ==/?indoorLevel=1&ll=55.960964%2C54.736354&utm_medium=mapframe&utm_source=maps&z=16.83" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Цюрупы, 97к3 — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?indoorLevel=1&ll=55.960964%2C54.736354&mode=poi&poi%5Bpoint%5D=55.957936%2C54.736379&z=16.83" width="500" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
          
                    
                </div>
                

        </div>
    </section>
    <x-footer/>