
<x-x-header />

<x-alerts/>
        <div class="container d-flex main_goods ">
            <img src="/storage/img/{{$product->img}}" alt="фотография товара" class="img_goods">
            <div class="main_goods_text">
              <h2 class="fw-bold">{{$product->title}}</h2>
              <p class="cost_goods">{{$product->cost}}₽</p>
           
                <div>
                  <hr style="margin: 0,1rem;">
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
                  <p><span>Категория:</span> {{$product->Categories->title}} </p>
                  <p style="width:400px;"><span>Описание:</span> {{$product->description}} </p>
                
                  <p><span>Вес:</span> {{$product->weight}}</p>
                  <hr>
                </div>
                @auth
                <a href="{{ route('basket.r' , ['id' => $product->id])}}" class="buy_buton text-end">В корзину</a>
                @endauth
                @guest
                <a href="/auth/auth" class="buy_buton buy_buton_no text-end">Войти в аккаунт</a>
                @endguest
            </div>
        </div>
        <section class="container">

  <h1 class="text-center mb-4" style="color:#A408A7;">Оставьте свой отзыв</h1>
  @auth
  <form method="post" action="/{{$product->id}}/comment_cafes" id="comment-form">
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
      <input class="form-control comment" id="comment" rows="3" name="comment" required>
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
        @php
    \Carbon\Carbon::setLocale('ru');
    $date = $comment->created_at->locale('ru')->isoFormat('D MMMM YYYY');
@endphp
       <p class="card-title time_comment ">{{ $date }}</p>
        <div class="star-rating">
        @for ($i = 1; $i <= 5; $i++)
    @if ($i == 1)
        @if ($i <= $comment->rating)
            <i class="fas fa-star purple-star"></i>
        @else
            <i class="far fa-star purple-star"></i>
        @endif
    @else
        @if ($i <= $comment->rating)
            <i class="fas fa-star"></i>
        @else
            <i class="far fa-star"></i>
        @endif
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
     
<x-footer/>
<script src="script/script.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var ratingResults = document.querySelectorAll('.rating-result');
  
    for (var i = 0; i < ratingResults.length; i++) {
      var ratingResult = ratingResults[i];
      var rating = ratingResult.getAttribute('data-rating');
      var spans = ratingResult.querySelectorAll('span');
  
      for (var j = 0; j < spans.length; j++) {
        var span = spans[j];
  
        if (j < rating) {
          span.classList.add('active');
        } else {
          span.classList.remove('active');
        }
      }
    }
  });
</script>