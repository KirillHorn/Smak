
<x-x-header/>


    <section class="banner">
        <div class="container">
            <div class="banner_text d-flex flex-column "> 
            <h1>АППЕТИТНЫЕ ЦЕНЫ ЖДУТ ВАС!<span>И не только!</span></h1>
          
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
                <a href="{{ route('products', ['sort_order' => '0']) }}">Перейти к блюдам <img src="/img/bxs_dish.png"></a>
            </div>
                <div class="d-flex flex-wrap grid">
                    @foreach ($product as $products)
                    <div class="cart_cafe  g-col-2">
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
                <div class="d-flex align-items-center justify-content-between text-around mt-5">
                    <div class="categories_block p-5 d-flex flex-column ">
                        <h3>Любые категории блюд</h3>
                        <p>Привезём блюда из кафе и ресторанов</p>
                            <div class="categories_link d-flex flex-wrap gap-3 mb-3">
                                @foreach($categoria as $categories_product)
                                <a href="{{ route ('products',  ['sort_order' => $categories_product->id]) }}" >{{$categories_product->title}}</a>   
                                @endforeach
                            </div>
                            <a href="{{ route('products', ['sort_order' => '0']) }}" class="mt-1 all_categories" style="width:24%;" >Все блюда</a>
                    </div>
                    <div  class="categories_block p-5 d-flex flex-column">
                        <h3>Многообразие вкусов</h3>
                        <p>Выберите свою любимую кухню!</p>
                            <div class="categories_link d-flex flex-wrap gap-3 mb-3">
                            @foreach ($categorcafe as $categorcafes)
    <a href= "{{route ('cafe',['sort_order' => $categorcafes->id ]) }}" class="">{{$categorcafes->title_categories}}</a>
@endforeach
                            </div>
                            <a href="{{ route('cafe', ['sort_order' => '0']) }}" class="mt-1 all_categories" style="width:24%;"  >Все кухня</a>
                    </div>
                </div>
                

        </div>
    </section>
    <x-footer/>