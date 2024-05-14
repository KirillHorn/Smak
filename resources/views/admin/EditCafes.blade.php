@include('admin.inc.sidebar')
<x-alerts/>
<div class="wrapper">
    <div class="container">
        <h2 class="text-center">Заведение</h2>
        <form action="{{route ('edit.update', ['id' => $cafes_info->id])}}" method="POST" enctype="multipart/form-data" class="addservice">
           
            @csrf

            <h2 class="text-center">Редактировать Заведения</h2>
            <img src="/storage/img/{{ $cafes_info->img }}" class="img_view">
            <input type="hidden" value="" name="id">
            <div class="mb-3">
                <label for="formFile" class="form-label">Название Заведения</label>
                <input type="title" class="form-control" name="title" value="{{ $cafes_info->title }}"
                    placeholder="@error('title') {{$message}}  @enderror" >
                    
            </div>
            <div class="mb-3">
                <label for="imageFile" class="form-label">Фотография товара</label>
                <p>@error('img') {{$message}}  @enderror</p>
                <input class="form-control" name="img" value="{{ $cafes_info->img }}" type="file" id="imageFile">
                    <img class="img_view" id="prevImage" src="#" alt=""/>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Местоположение</label>
                <textarea class="form-control" name="location" value="" rows="8" placeholder="@error('location') {{$message}}  @enderror" id="imageFile"
                    >{{ $cafes_info->location }}</textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Категория</label>
                <select name="categoria_id" class="form-control">
                    <option value="{{ $cafes_info->id_categoriesCafe }}">
                        {{ $cafes_info->categoriesCafe->title_categories }}</option>
                        @foreach ($categoria_cafe as $categoria)
                        <option value="{{ $categoria->id}}">
                          {{ $categoria->title_categories }}</option>
                        @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn_buttom">Редактировать Заведение</button>
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
  
  
  </script>
