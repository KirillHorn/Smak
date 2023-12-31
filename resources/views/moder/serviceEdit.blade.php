@include('moder.inc.sidebar')
<div class="wrapper">
<div class="container">
  <h2 class="text-center">Заведения: удаление|редактирование</h2>

 @if (session ("kasdksakda"))
 <div>
    <span  id="message">{{session("kasdksakda")}}</span>
</div>
 @endif

 @if (session ("destroy"))
 <div>
    <span  id="message">{{session("destroy")}}</span>
</div>
 @endif

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">Фото</th>
      <th scope="col">Категория</th>
      <th scope="col">Местоположение</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cafe as $cafes)
    <tr>
      <td class="align-middle fw-bold">{{$cafes->id}}</td>
      <td class="align-middle fw-bolder">{{$cafes->title}}</td>
      <td class="align-middle"><img src="/storage/img/{{$cafes->img}}" alt="" class="img_align"></td>
      <td class="align-middle">{{$cafes->categoriesCafe->title_categories}}</td>
      <td class="align-middle">{{$cafes->location}}</td>
      <td class="align-middle"><a href="/moder/{{$cafes->id}}/Edit"><button type="submit" class="btn btn-primary button_redact">Редактировать</button></a></td>
      <td class="align-middle">
      <form action="{{route ('delete.cafes' , ['id' => $cafes->id ])}}" method="POST">
                        @csrf
                         @method('DELETE')            
      <button type="submit" class="btn btn-danger" style="margin-top: 16px">Удалить</button>
      </form>
    </td>
    </tr>
    @endforeach
   
  </tbody>
  </table>
  <hr>
</div>
</div>
<script>

setTimeout(function(){
    document.getElementById('message').style.display = 'none';
  }, 5000);

  </script>
