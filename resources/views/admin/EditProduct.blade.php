@include('admin.inc.sidebar')
<x-alerts/>
<div class="wrapper">
    <div class="container">
        <h2 class="text-center">Блюда</h2>
        <form action="{{route('products.update', ['id' => $product->id ])}}" method="POST" enctype="multipart/form-data" class="addservice">
            @csrf
            <h2 class="text-center">Редактировать блюда</h2>
            <img src="/storage/img/{{ $product->img }}" class="img_view">
            <div class="mb-3">
                <p>Категория блюда</p>
                <select name="id_categories" class="categories_add_products form-control @error('id_categories') is-invalid @enderror">
                    <option value="{{ $product->id_categories }}">{{ $product->Categories->title }}</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
                @error('id_categories')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Название блюда</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $product->title }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Описание блюда</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="8">{{ $product->description }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Вес блюда/Грам</label>
                <input type="text" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ $product->weight }}">
                @error('weight')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Цена товара/Руб</label>
                <input type="text" name="cost" class="form-control @error('cost') is-invalid @enderror" value="{{ $product->cost }}">
                @error('cost')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="imageFile" class="form-label">Фотография блюда</label>
                <input class="form-control @error('img') is-invalid @enderror" name="img" type="file" id="imageFile">
                @error('img')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <img class="img_view" id="prevImage" src="#" alt="" />
            </div>
           
            <button type="submit" class="btn btn-primary btn_buttom">Редактировать</button>
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

    setTimeout(function() {
        document.getElementById('message').style.display = 'none';
    }, 5000);

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