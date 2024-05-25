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
                <label  class="form-label">Название блюда</label>
                <input type="text" name="title" class="form-control" value="{{$product->title}}" >
                <span>@error('title') {{$message}}  @enderror</span>
            </div>
            <div class="mb-3">
                <label  class="form-label">Описание блюда</label>
                <textarea class="form-control" name="description" rows="8" >
                {{$product->description}}
            </textarea>
            <span>@error('description') {{$message}}  @enderror</span>
            </div>
            <div class="mb-3">
                <label  class="form-label">Вес блюда/Грам</label>
                <input type="text" name="weight" class="form-control" value="{{$product->weight}}" >
                <span>@error('weight') {{$message}}  @enderror</span>
            </div>
            <div class="mb-3">
                <label  class="form-label">Цена товара/Руб</label>
                <input type="text" name="cost" class="form-control" value="{{$product->cost}}" >
                <span>@error('cost') {{$message}}  @enderror</span>
            </div>


            <div class="mb-3">
                <label for="imageFile" class="form-label">Фотография блюда</label>
                <p>@error('img') {{$message}} @enderror</p>
                <input class="form-control" name="img" type="file" id="imageFile" >
                <img class="img_view" id="prevImage" src="#" alt="" />
            </div>
            <div class="mb-3">
                <p>Категория блюда</p>
                <select name="id_categories">
                <option value="{{$product->id_categories}}"> {{$product->Categories->title}}</option>
                    @foreach ($categories as $item )
                    <option value="{{$item->id}}"> {{ $item->title}}</option>
                    @endforeach
                </select>
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
</script>