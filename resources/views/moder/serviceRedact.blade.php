@include('moder.inc.sidebar')
<div class="wrapper">
  
<div class="container">
  <div>
   @if (session ("addproduct"))
   <div>
      <span  id="message">{{session("addproduct")}}</span>
</div>
   @endif

  
  </div>
  <form action="/edit_cafe" method="POST" enctype="multipart/form-data" class="addservice">
    <h2 class="text-center">Добавить Заведение</h2>
    @csrf
    <div class="mb-3"><input type="text" name="title" class="form-control" placeholder="Название заведения" required></div>
    <div class="mb-3">
      <label for="imageFile" class="form-label">Фотография заведения</label>
      <input class="form-control" name="img" type="file" id="imageFile" required>
      <img class="img_view" id="prevImage" src="#" alt=""/>
    </div>
    <div class="mb-3">
    <select name="id_categoriesCafe"> 
    @foreach ($categories as $item )
    <option value="{{ $item->id_categories}}"> {{ $item->title_categories}}</option>
    @endforeach
</select>
    </div>
    <div class="mb-3">
      <input class="form-control" name="location" placeholder="Местоположение заведения" type="text" required>
    </div>
    
  
</select>
    <button type="submit" class="btn btn-primary">Добавить товар</button>
  </form>
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