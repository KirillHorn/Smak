@include('moder.inc.sidebar')
<div class="wrapper">

  <div class="container">
    <div>
      @if (session ("addproduct"))
      <div>
        <span id="message">{{session("addproduct")}}</span>
      </div>
      @endif


    </div>
    <form action="/edit_product" method="POST" enctype="multipart/form-data" class="addservice">
      <h2 class="text-center">Добавить Продукт</h2>
      @csrf
      <div class="mb-3"><input type="text" name="title" class="form-control" placeholder="Название продукта"></div>
      <div class="mb-3">
        <textarea class="form-control" name="description" value="" rows="8" placeholder="Описание" id="imageFile">
</textarea>
      </div>
      <div class="mb-3">
        <input type="text" name="weight" class="form-control" placeholder="Вес продукта">
      </div>
      <div class="mb-3">
        <input type="text" name="cost" class="form-control" placeholder="Цена">
      </div>


      <div class="mb-3">
        <label for="imageFile" class="form-label">Фотография Продукта</label>
        <input class="form-control" name="img" type="file" id="imageFile" required>
        <img class="img_view" id="prevImage" src="#" alt="" />
      </div>

      <div class="mb-3">
        <p>Заведение</p>
        <select name="id_cafe">
          @foreach ($cafe as $item )
          <option value="{{$item->id}}"> {{ $item->title}}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <p>Категория продукта</p>
        <select name="id_categories">
          @foreach ($categories as $item )
          <option value="{{$item->id}}"> {{ $item->title}}</option>
          @endforeach
        </select>
      </div>
      </select>
      <button type="submit" class="btn btn-primary">Добавить Заведение</button>
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

  setTimeout(function() {
    document.getElementById('message').style.display = 'none';
  }, 5000);
</script>