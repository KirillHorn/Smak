
<x-x-header />
    <section class="section_product_nav">
        <div class="container d-flex flex-column gap-3">
            <div class="directory_nav">
                <a>О нас</a>
                <span>→</span>
                <a>Блюда</a>
            </div>
                <div class="navigation d-flex flex-column gap-3">
                        <div>
                            <span>42 точки</span>
                            <h2> Доставка еды из заведений Уфы</h2>
                        </div>
                            <div class="d-flex flex-column gap-4">
                                <!-- <input type="search" class="search_content"> -->
                                    <div class="d-flex flex-wrap gap-4  a_content_categories">
                                    <a href="{{ route ('products',  ['sort_order' => '0']) }}" style=" color:#A408A7;">Все категории</a>
                                   @foreach ($categories as $categories_product)
                                    <a href="{{ route ('products',  ['sort_order' => $categories_product->id]) }}" style=" color:#A408A7;"
                                
                                    >
                                    {{$categories_product->title}}</a>
                                   @endforeach
                                     </div>
                             </div>
                     </div>
             </div>
    </section>
  
        <section class="product_section">
        <div class="container">
        
                <div class="d-flex flex-wrap grid gap-4">
                @foreach ($product as $products)
                    <div class="cart_cafe cart_product g-col-4 cart_product_text ">
                    <a href="{{route ('goods.r', ['id'=>$products->id])}}">
                        <img src="/storage/img/{{$products->img}}" alt="картинка заведения"> 
                      
                        <p >{{$products->Categories->title}}</p>
                       
                        <a style="color: #A408A7;" class="fw-bolder">{{$products->title}}</a>
                        <div class="d-flex gap-5">
                        <p class="fw-bold">{{$products->cost}}₽</p>
                        </a>
                        </div>
                    
                    </div>
                   
                    @endforeach   
                    @foreach ($product as $products)
                    <div class="cart_cafe cart_product g-col-4 cart_product_text ">
                    <a href="{{route ('goods.r', ['id'=>$products->id])}}">
                        <img src="/storage/img/{{$products->img}}" alt="картинка заведения"> 
                      
                        <p >{{$products->Categories->title}}</p>
                       
                        <a style="padding-top: 0px;  color: #A408A7;" class="fw-bolder">{{$products->title}}</a>
                        <div class="d-flex gap-5">
                        <p class="fw-bold">{{$products->cost}}₽</p>
                        </a>
                        </div>
                    
                    </div>
                   
                    @endforeach      
                    <div>
         
                </div>
              {{ $product->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
                    
        </div>
    </section>
   
    <x-footer/>