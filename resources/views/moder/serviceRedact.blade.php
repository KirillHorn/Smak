@include('moder.inc.sidebar')
<div class="wrapper">
<div class="container">
  <form action="/addproduct" method="POST" enctype="multipart/form-data" class="addservice">
    <h2 class="text-center">Добавить товар</h2>
    @csrf
    <div class="mb-3"><input type="text" name="title" class="form-control" placeholder="Название товара" required></div>
    <div class="mb-3">
      <label for="imageFile" class="form-label">Фотография товара</label>
      <input class="form-control" name="img" type="file" id="imageFile" required>
      <img id="prevImage" src="#" alt=""/>
    </div>
    <div class="mb-3"><textarea class="form-control" name="description" rows="8" placeholder="Описание" required></textarea></div>
    <div class="mb-3"><input type="text" name="cost" class="form-control" placeholder="Цена" required></div>
    <select name="categoru_id"> 
    
    <option value=""> </option>
  
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
</script>