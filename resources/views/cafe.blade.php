
<x-x-header />
    <section class="section_product_nav">
        <div class="container d-flex flex-column gap-3" style="padding-bottom: 60px;">
            <div class="directory_nav">
                <a>Уфа</a>
                <span>→</span>
                <a>Блюда</a>
            </div>
                <div class="navigation d-flex flex-column gap-3">
                        <div>
                            <span>42 точки</span>
                            <h2> Доставка еды из заведений Уфы</h2>
                        </div>
                            <div class="d-flex flex-column gap-4">
                                <input type="search" class="search_content">
                                    <div class="d-flex flex-wrap gap-4  a_content_categories">
                                        @foreach ($categorcafe as $categorcafes)
                                    <a class="capitalize" style="color: #A408A7;">{{$categorcafes->title_categories}}</a>
                                    @endforeach
                                     </div>
                             </div>
                     </div>
             </div>
    </section>
    <section class="product_section ">
        <div class="container">
            
                <div class="d-flex flex-wrap grid gap-4">
                @foreach ($cafe as $cafe_info)
                    <div class="cart_cafe g-col-4 cart_product_text">
                    <a href=" {{route('show.r', ['id_cafe'=>$cafe_info->id])}}">
                        <img src="/storage/img/{{$cafe_info->img}}" alt="картинка заведения"> 
                        <p class="capitalize">{{$cafe_info->categoriesCafe->title_categories}} • ₽</p>
                        <a style="color: #A408A7;">{{$cafe_info->title}}</a>
                        </a>
                    </div>
                    @endforeach
                </div>
                {{ $cafe->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </section>
       
   
    <x-footer/>