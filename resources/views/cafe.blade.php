
<x-x-header />
    <section class="section_product_nav">
        <div class="container d-flex flex-column gap-3">
            <div class="directory_nav">
                <a>О нас</a>
                <span>→</span>
                <a>Заведения</a>
            </div>
                <div class="navigation d-flex flex-column gap-3">
                        <div>
                            <span>42 точки</span>
                            <h2> Доставка еды из заведений Уфы</h2>
                        </div>
                            <div class="d-flex flex-column gap-4">
                                    <div class="d-flex flex-wrap gap-4  a_content_categories">
                                    <a href="{{ route('cafe', ['sort_order' => '0']) }}" >Все категории</a>
                                        @foreach ($categorcafe as $categorcafes)
                                    <a  href= "{{route ('cafe',['sort_order' => $categorcafes->id ]) }}" >{{$categorcafes->title_categories}}</a>
                                    @endforeach
                                     </div>
                             </div>
                     </div>
             </div>
    </section>
    <section class="product_section ">
        <div class="container">

                  <div class="d-flex d-flex  flex-wrap gap-3 cafe">
                @foreach ($cafe as $cafe_info)
                <div class="cart_cafe cart_product cart_product_text">
                    <a href=" {{route('show.r', ['id_cafe'=>$cafe_info->id])}}">
                        <img src="/storage/img/{{$cafe_info->img}}" alt="картинка заведения"> 
                        <p class="capitalize">{{$cafe_info->categoriesCafe->title_categories}} • ₽</p>
                        <p style="color: #A408A7;">{{$cafe_info->title}} {{$cafe_info->rating_cafe}}</p>
        
                        </a>
                    </div>
                    @endforeach
                </div>
                
                {{ $cafe->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </section>
       
   
    <x-footer/>