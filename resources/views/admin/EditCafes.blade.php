@include('admin.inc.sidebar')

<x-alerts/>
<div class="wrapper">
    <div class="container">
        <h2 class="text-center">Филиал</h2>
        <form action="{{route ('edit.update', ['id' => $branchs->id])}}" method="POST" enctype="multipart/form-data" class="addservice">
           
            @csrf

            <h2 class="text-center">Редактировать Филиал</h2>
            <img src="/storage/img/{{ $branchs->img }}" class="img_view">
            <input type="hidden" value="" name="id">
            <div class="mb-3">
                <label for="formFile" class="form-label">Название Филиала</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $branchs->title }}"
                    placeholder="@error('title') {{ $message }} @enderror">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Номер телефона филиала</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $branchs->phone }}"
                    placeholder="@error('phone') {{ $message }} @enderror">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="imageFile" class="form-label">Фотография Филиала</label>
                <input class="form-control @error('img') is-invalid @enderror" name="img" type="file" id="imageFile">
                @error('img')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <img class="img_view" id="prevImage" src="#" alt=""/>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Улица</label>
                <input type="search" name="id_street" class="search_content form-control @error('id_street') is-invalid @enderror" value="{{ $branchs->street->title_street }}" id="tags">
                <div id="tags_results" class="search-results" style="max-height: 200px; overflow-y: auto;"></div>
                @error('id_street')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Дом</label>
                <input type="text" name="location_detalis" value="{{ $branchs->location_detalis }}" class="form-control @error('location_detalis') is-invalid @enderror">
                @error('location_detalis')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn_buttom">Редактировать Филиал</button>
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

document.addEventListener('DOMContentLoaded', function() {
  // Получаем все элементы input
  const inputs = document.querySelectorAll('input');

  // Для каждого input добавляем обработчик события focus
  inputs.forEach(input => {
      input.addEventListener('focus', function() {
          // Удаляем класс is-invalid
          this.classList.remove('is-invalid');

          // Удаляем текст ошибки, если он есть
          const errorSpan = this.nextElementSibling;
          if (errorSpan && errorSpan.classList.contains('text-danger')) {
              errorSpan.style.display = 'none';
          }
      });
  });
});
  
  </script>
