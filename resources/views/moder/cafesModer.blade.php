@include('moder.inc.sidebar')
<x-alerts/>
<div class="wrapper">

<div class="container">
  <div class="d-flex nav_goods align-items-center flex-column gap-3">
    <p>{{$cafes->title}}</p>
    <div class="d-flex flex-column flex-md-row align-items-center gap-3 ">
      <img src="/storage/img/{{$cafes->img}}" alt="изображение заведения" class="img-fluid">
      <div class="information_cafe_moder">
        <p>Местоположение: {{$cafes->location}}</p>
        <p>Категория: {{$cafes->categoriesCafe->title_categories}}</p>
        <p>Количество блюд: {{$cafes->count_product()}}</p>
        <p>Прибыль: {{$cafes->count_product()}}</p>
      </div>
    </div>
  </div>
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
