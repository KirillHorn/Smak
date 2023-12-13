
<x-x-header />


    <section class="">
        <div class="container d-flex main_goods ">
            <img src="/storage/img/{{$product->img}}" alt="фотография товара" class="img_goods">
            <div class="main_goods_text">
              <h2 class="fw-bold">{{$product->title}}</h2>
              <p style="font-size: 40px;">{{$product->cost}}₽</p>
              <p>Заведение: <a href="{{route('show.r', ['id_cafe'=>$product->Cafe->id])}}"> <span style=" color: #A408A7;">{{$product->Cafe->title}}</span></a></p>
                <div>
                  <hr>
                  <p><span>Категория:</span> {{$product->Categories->title}} </p>
                  <p><span>Описание:</span> {{$product->description}} </p>
                
                  <p><span>Вес:</span> {{$product->weight}}</p>
                  <hr>
                </div>
                <a class="buy_buton text-end">Купить</a>
            </div>
        </div>
    </section>
 
<x-footer/>