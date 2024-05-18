

<x-x-header/>
    <section class="section_product_nav">
        <div class="container d-flex flex-column gap-3">
      
                <div class="navigation d-flex flex-column gap-3">
        
                            <h2>Найдите всё что вам нужно!</h2>
                 
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
    <ul class="list-group d-flex ">
    <div id="search-results" class="search-results d-flex flex-wrap ">

@forelse ($results as $result )
@if ($result instanceof App\Models\Cafe)
        <div class="cart_cafe g-col-4 cart_product_text">
     
                <img src="/storage/img/{{ $result->img }}" alt="картинка заведения">
                <p class="capitalize">{{ $result->categoriesCafe->title_categories }} • ₽</p>
                <p style="color: #A408A7;">{{ $result->title }}</>

        </div>
    @elseif ($result instanceof App\Models\Products)

    <div class="cart_cafe g-col-4 cart_product_text">
                    <a href=" {{route('show.r', ['id_cafe'=>$result->id])}}">
                        <img src="/storage/img/{{$result->img}}" alt="картинка заведения"> 
                        <p class="capitalize">{{$result->Categories->title}} • ₽</p>
                        <p style="color: #A408A7;">{{$result->title}}</p>
                        </a>
                    </div>
        
    @endif
    @empty
    <div>Ничего нету(</div>
@endforelse
</div>
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