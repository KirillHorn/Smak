@include('moder.inc.sidebar')
<div class="wrapper">
<div class="container">
  <h2 class="text-center">Товар</h2>
  <form action="" method="POST" enctype="multipart/form-data" class="addservice">
    @csrf
   
    <h2 class="text-center">Редактировать товар</h2>
   <img src="/storage/img/" class="img_edit">
<input type="hidden" value="" name="id">
    <div class="mb-3">
    <label for="formFile" class="form-label">Название товара</label>  
    <input type="title" class="form-control" name="title" value="" placeholder="" required></div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Фотография товара</label>
      <input class="form-control" name="img" value="" type="file" id="formFile" required>
    </div>
    <div class="mb-3">
    <label for="formFile" class="form-label">Описание</label>   
    <textarea class="form-control" name="description" value="" rows="8" placeholder="Описание" required></textarea></div>
    <div class="mb-3">
    <label for="formFile" class="form-label">Цена</label>   
    <input type="text" class="form-control" name="cost" value="" placeholder="Цена" required></div>
    <div class="mb-3">
    <label for="formFile" class="form-label">Категория</label> 
    <select name="categoru_id" class="form-control"> 
      
   
    <option value=""> </option>
  
</select>
</div>
    <button type="submit" class="btn btn-primary">Редактировать</button>
  </form>
  <hr>
</div>
</div>
