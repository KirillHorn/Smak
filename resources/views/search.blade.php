

<x-x-header/>
    <section class="section_product_nav">
        <div class="container d-flex flex-column gap-3" style="padding-bottom: 60px;">
            <div class="directory_nav">
                <a>Уфа</a>
                <span>→</span>
            </div>
                <div class="navigation d-flex flex-column gap-3">
                        <div>
                            <span>42 точки</span>
                            <h2> Доставка еды из заведений Уфы</h2>
                        </div>
                        <div><div class="ui-widget">

                            <form role="search" method="GET" action="/search">
                                <input type="search" name="search" class="search_content"  id="tags">
                                <div id="tags" class="search-results"></div>
                              
                            </form>
                            </div>
                        </div>
                     </div>
             </div>
    </section>
    <section class="product_section ">
        <div class="container">
            
                <div class="d-flex flex-wrap grid gap-4">
                <div class="container">
    <h1>Результаты поиска</h1>
    <ul class="list-group">
    <div id="search-results" class="search-results"></div>

@foreach ($results as $result )
@if ($result instanceof App\Models\Cafe)
        <div class="cart_cafe g-col-4 cart_product_text">
     
                <img src="/storage/img/{{ $result->img }}" alt="картинка заведения">
                <p class="capitalize">{{ $result->categoriesCafe->title_categories }} • ₽</p>
                <a style="color: #A408A7;">{{ $result->title }}</a>

        </div>
    @elseif ($result instanceof App\Models\Products)
        <div class="cart_cafe g-col-4 cart_product_text">
        
                <img src="/storage/img/{{ $result->img }}" alt="картинка блюда">
                <p class="capitalize">{{ $result->categories->title_categories }} • {{ $result->cost }} ₽</p>
                <a style="color: #A408A7;">{{ $result->title }}</a>
          
        </div>
    @endif
@endforeach
</div>
                </div>
       
        </div>
    </section>
       
   
    <x-footer/>
    <script>
// $(function() {
//     function search(request, response) {
//         $.ajax({
//             url: '/search',
//             type: 'GET',
//             dataType: 'json',
//             data: {
//                 search: request.term
//             },
//             success: function(data) {
//                 response(data.map(function(item) {
//                     return {
//                         label: item.title,
//                         value: item.title
//                     };
//                 }));
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 console.error(textStatus, errorThrown);
//             }
//         });
//     }

//     $("#search-input").autocomplete({
//         source: search,
//         minLength: 2,
//         select: function(event, ui) {
//             // Действия при выборе элемента из автозаполнения
//         }
//     });
// });
    </script>

    
<script>
      $( function() {
        var availableTags = {!! $cafeJson !!}.concat({!! $productJson !!});
  $( "#tags" ).autocomplete({
    source: availableTags
  });
} );
      </script>