@include('moder.inc.sidebar')
<x-alerts/>
<div class="wrapper">
<div class="container">
  <h2 class="text-center">Продукты: удаление|редактирование</h2>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">Фото</th>
      <th scope="col">Описание</th>
      <th scope="col">Вес</th>
      <th scope="col">Цена</th>
      <th scope="col">Заведение</th>
      <th scope="col">Категория</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
    <tr>
      <td class="align-middle fw-bold">{{$product->id}}</td>
      <td class="align-middle fw-bolder">{{$product->title}}</td>
      <td class="align-middle"><img src="/storage/img/{{$product->img}}" alt="" class="img_align"></td>
      <td class="align-middle">{{$product->description}}</td>
      <td class="align-middle">{{$product->weight}}</td>
      <td class="align-middle">{{$product->cost}}</td>
      <td class="align-middle" style="text-transform:capitalize;">{{$product->Cafe->title}}</td>
      <td class="align-middle">{{$product->Categories->title}}</td>
      <td class="align-middle"><a href="/moder/{{$product->id}}/EditProduct"><button type="submit" class="btn btn-primary button_redact">Редактировать</button></a></td>
      <td class="align-middle">
      <form action="{{route ('delete.product' , ['id' => $product->id])}}" method="POST">
                        @csrf
                         @method('DELETE')   
                        
      <button type="submit" class="btn btn-danger" style="margin-top: 16px">Удалить</button>
      </form>
    </td>
    </tr>
    @endforeach
   
  </tbody>
  </table>
  {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
  <hr>
</div>
</div>
<script>

setTimeout(function(){
    document.getElementById('message').style.display = 'none';
  }, 5000);

  </script>
