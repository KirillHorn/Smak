@include('admin.inc.sidebar')
<x-alerts/>
<div class="wrapper">
    <div class="container">
        <h2 class="text-center">Категории продукты</h2>
        <form action="/categories_Add" method="POST" class="addservice">
           
            @csrf

            <h2 class="text-center">Добавить категорию продукта</h2>
            <div class="mb-3">
                <label for="formFile" class="form-label">Название категории</label>
                <input type="title" class="form-control" name="title" 
                    placeholder="@error('title') {{$message}}  @enderror" >
                    
            </div>
            <button type="submit" class="btn btn-primary btn_buttom">Добавить категорию</button>
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
