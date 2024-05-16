<x-x-header />
<section class="">
  <div class="container">
    <div class="d-flex nav_goods align-items-center gap-3">
      <img src="/img/mdi_food-ramen.svg" alt="Тут">
      <p>Заведение {{$cafes->title}}</p>
    </div>
  </div>
</section>
<section class=" ">
  <div class="container">
    <div class="information_cafe_main d-flex ">
      <div class="information_cafe_main_one d-flex flex-column gap-3">
        <div class="information_cafe_main_one_fon d-flex align-items-end gap-3">
          <img src="/storage/img/{{$cafes->img}}" alt="изображение заведения">
          <p class="fs-1 fw-bold">{{$cafes->title}}</p>

        </div>
        <!-- <input type="search" class="search_content search_goods"> -->
      </div>
      <iframe class="iframe_goods" src="https://yandex.ru/map-widget/v1/?um=constructor%3A11744030def0a8feaad6cce670b0946d4bca01fd6116e2522927cde0288642f7&amp;source=constructor" frameborder="0"></iframe>
    </div>

    <div class="information_cafe_product d-flex ">
      <div class="cafe_product d-flex " style="width: 100%;">
        <div class="w-60" style="width: 66%;">
          <h2>Блюда заведений</h2>
          <div class="d-flex flex-wrap grid gap-4 ">
            @foreach ($product_cafe as $product)
            <a href="{{route ('goods.r', ['id'=>$product->id])}}">
              <div class="cafe_product_info cart_cafe_product g-col-4">
                <img src="/storage/img/{{$product->img}}" alt="картинка блюда">
                <p style="margin-bottom: 0rem;">{{$product->title}}</p>
                <p class="fw-bold">{{$product->cost}} ₽•45 минут</p>
              </div>
            </a>
            @endforeach
          </div>
        </div>

        <div style="width: 34%;" class="d-flex flex-column align-items-center">
          <h2>Общая оценка заведения</h2>
          <div class="rating_block d-flex">
            <p class="mb-0">{{ $averageRating }}</p>
            <div class="rating-result" data-rating="{{ $averageRating }}">
              <span class="star"></span>
              <span class="star"></span>
              <span class="star"></span>
              <span class="star"></span>
              <span class="star"></span>
            </div>

          </div>
        </div>
      </div>
    </div>
</section>
<section class="container">

  <h1 class="text-center mb-4" style="color:#A408A7;">Оставьте свой отзыв</h1>
  @auth
  <form method="post" action="/{{$cafes->id}}/comment_cafes" id="comment-form">
    @csrf
    <div class="rating-area">
      <input type="radio" id="star-5" name="rating" value="5">
      <label for="star-5" title="Оценка «5»"></label>
      <input type="radio" id="star-4" name="rating" value="4">
      <label for="star-4" title="Оценка «4»"></label>
      <input type="radio" id="star-3" name="rating" value="3">
      <label for="star-3" title="Оценка «3»"></label>
      <input type="radio" id="star-2" name="rating" value="2">
      <label for="star-2" title="Оценка «2»"></label>
      <input type="radio" id="star-1" name="rating" value="1">
      <label for="star-1" title="Оценка «1»"></label>
    </div>
    <div class="invalid-feedback"></div>
    <div class="form-group mb-3">
      <label for="comment">Ваш отзыв</label>
      <textarea class="form-control comment" id="comment" rows="3" name="comment" required></textarea>
      <div id="charCount"></div>
      <div class="error" id="error" style="display: none;">Комментарий не должен превышать 100 символов</div>
      <div class="invalid-feedback"></div>
    </div>
    <button type="submit" class="btn btn-primary btn_comment">Отправить</button>
  </form>
  @endauth
  @guest
  <p style="color: #A408A7; font-size:20px; text-align:center;">Авторизируйтесь для того, чтобы оставить отзыв!</p>
  @endguest
  </div>

  <div id="comments-container" class="container mt-5 ">
    <h2 class="text-center mb-4">Отзывы</h2>
    <script type="text/template" id="comment-template">
      <div class="card mb-3">
      <div class="card-body comments-container">
        <h5 class="card-title">__USERNAME__</h5>
        <div class="star-rating">
          __RATING__
        </div>
        <p class="card-text">
          __COMMENT__
        </p>
      </div>
    </div>
</script>
    @foreach ( $comments as $comment )
    <div class="card mb-3">
      <div class="card-body comments-container">
        <h5 class="card-title">{{$comment->user_comment->name}}</h5>
        <div class="star-rating">
          @for ($i = 1; $i <= 5; $i++) @if ($i <=$comment->rating)
            ⭐
            @else
            ☆
            @endif
            @endfor
        </div>
        <p class="card-text">
          {{ $comment->comments_text }}
        </p>
      </div>
    </div>
    @endforeach


</section>


<x-footer />
<script src="script/script.js"></script>