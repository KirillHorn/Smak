@include('admin.inc.sidebar')

<x-alerts/>
<div class="wrapper">
    <div class="container">
        <h2 class="text-center">Филиал</h2>
        <form action="/add_branch" method="POST" enctype="multipart/form-data" class="addservice">
           
            @csrf

            <h2 class="text-center">Добавить филиал</h2>

            <div class="mb-3">
                <label for="formFile" class="form-label">Название филиал</label>
                <input type="title" class="form-control" name="title" value=""
                    placeholder="@error('title') {{$message}}  @enderror" >
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Номер телефона филиала</label>
                <input type="phone" class="form-control" name="phone" value=""
                    placeholder="@error('title') {{$message}}  @enderror" >
            </div>
            <div class="mb-3">
                <label for="imageFile" class="form-label">Фотография филиала</label>
                <p>@error('img') {{$message}}  @enderror</p>
                <input class="form-control" name="img" value="" type="file" id="imageFile">
                    <img class="img_view" id="prevImage" src="#" alt=""/>
            </div>
            <div class="mb-3">
            <label for="formFile" class="form-label">Улица</label>
                <input type="search" name="id_street" class="search_content form-control"  id="tags">
                <div id="tags_results" class="search-results" style=" max-height: 200px;   overflow-y: auto;"></div>
            </div>
            <div class="mb-3">
            <label for="formFile" class="form-label">Дом</label>
             <input type="text" name="location_detalis" class="form-control">
               
            </div>
            
            <button type="submit" class="btn btn-primary btn_buttom">Добавить филиал</button>
        </form>
        <hr>
    </div>
</div>
<script>
   function readURL(input) { //
        if (input.files && input.files[0]) {
            var reader = new FileReader(); //позволяет читать асинхронно содержимое файлов, хранящийся на пк

            reader.onloadend = function(e) { //Срабатывает только после того как скрипт был загружен  и выполнен
                $('#prevImage').attr('src', e.target.result); // attr - Название атрибута, которое нужно получить.
            }

            reader.readAsDataURL(input.files[0]); //используется для чтения содержимого files
        }
    }
    $("#imageFile").change(function() { //change - Событие  происходит по окончании изменения значения элемента формы, когда это изменение зафиксировано.
        readURL(this);
    });
  setTimeout(function(){
    document.getElementById('message').style.display = 'none';
  }, 5000);
  
  $(function() {
    var availableTags = {!! $streetJson !!}; // Предположим, что $streetJson содержит массив строк

    $( "#tags" ).autocomplete({
        source: availableTags 
    });
    
});
  </script>
