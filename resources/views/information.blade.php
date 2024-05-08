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
          <p class="fs-1 fw-bold">{{$cafes->title}}</p>

        </div>
        <!-- <input type="search" class="search_content search_goods"> -->
      </div>
      <iframe class="iframe_goods" src="https://yandex.ru/map-widget/v1/?um=constructor%3A11744030def0a8feaad6cce670b0946d4bca01fd6116e2522927cde0288642f7&amp;source=constructor" frameborder="0"></iframe>
    </div>

    <div class="information_cafe_product d-flex ">
      <div class="cafe_product d-flex " style="width: 100%;">
        <div class="w-60" style="width: 64%;">
          <h2>Блюда заведений</h2>
          <div class="d-flex flex-wrap grid gap-4 ">
            @foreach ($product_cafe as $product)
            <a href="{{route ('goods.r', ['id'=>$product->id])}}">
              <div class="cafe_product_info cart_cafe g-col-4">
                <img src="/storage/img/{{$product->img}}" alt="картинка блюда">
                <p>{{$product->title}}</p>
                <p class="fw-bold">{{$product->cost}} ₽•45 минут</p>
              </div>
            </a>
            @endforeach
          </div>
        </div>

        <div class="w-40" style="width: 36%;">
          <h2>Общая оценка заведения</h2>
          <div>
            <p>4.7</p>
            <div class="rating-result" data-rating="{{ $cafes->rating_cafe }}">
              <span class="active"></span>
              <span class="active"></span>
              <span class="active"></span>
              <span></span>
              <span></span>
            </div>

          </div>
        </div>
      </div>
    </div>
</section>
<section class="container">

  <h1 class="text-center mb-4">Оставьте свой отзыв</h1>
  <form method="post" action="/{{$cafes->id}}/comment_cafes">
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
    <div class="form-group mb-3">
      <label for="comment">Ваш отзыв</label>
      <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
  </form>
  </div>

  <div class="container mt-5">
    <h2 class="text-center mb-4">Отзывы</h2>
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">Иван Иванов</h5>
        <div class="star-rating">
          ⭐⭐⭐⭐⭐
        </div>
        <p class="card-text">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus porta, tincidunt turpis at, interdum tortor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
        </p>
      </div>
    </div>

</section>


<x-footer />
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