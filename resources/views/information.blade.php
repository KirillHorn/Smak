
<x-x-header />
    <section class="">
      <div class="container">
        <div class="d-flex nav_goods align-items-center gap-3">
            <img src="/img/mdi_food-ramen.svg" alt="Тут">
            <p>{{$cafes->title}} откроeтся в 10:00</p>
        </div>
      </div>
    </section>
    <section class=" ">
        <div class="container">
                <div class="information_cafe_main d-flex ">
                    <div class="information_cafe_main_one d-flex flex-column gap-3">
                      <div class="information_cafe_main_one_fon d-flex align-items-end gap-3">
                        <img src="/storage/img/{{$cafes->img}}" alt="изображение заведения">
                          <p class="fs-1 fw-bold" >{{$cafes->title}}</p>
                
                      </div>
                        <!-- <input type="search" class="search_content search_goods"> -->
                        </div>
                        <iframe class="iframe_goods" src="https://yandex.ru/map-widget/v1/?um=constructor%3A11744030def0a8feaad6cce670b0946d4bca01fd6116e2522927cde0288642f7&amp;source=constructor"  frameborder="0"></iframe>
                </div>

                <div class="information_cafe_product d-flex">
                    <div class="cafe_product">
                                <div class="">
                                    {{-- @if(isset($category))
                                    <h2 class="fw-bold">{{$category->title}}</h2>
                                    @endif --}}

                                    @foreach ($categoriesproduct as $category )
                                    <h2> {{$category->title}}</h2>
                                    <div class="d-flex flex-wrap grid gap-4 ">
                                        @foreach ($products as $product)
                                         <div class="cafe_product_info cart_cafe g-col-4">
                                            <img src="/storage/img/{{$product->img}}" alt="картинка заведения">
                                             <p>{{$product->title}}</p>

                                        <p class="fw-bold">{{$product->cost}} ₽•45 минут</p>
                                      </div>
                                      @endforeach

                                    </div>
                                    @endforeach
                                </div>



                                </div>

                        </div>
                        {{-- <div class="cafe_product_navigation ">
                          <ul class="">
                            @foreach ($categoriesproduct as $category )
                            <a href="#part1"><li>{{$category->title}}</li></a>
                            @endforeach


                          </ul>
                        </div> --}}
        </div>
    </section>


    <x-footer/>
    <script src="script/script.js"></script>
