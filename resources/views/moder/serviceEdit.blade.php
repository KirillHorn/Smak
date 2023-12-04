@include('moder.inc.sidebar')
<div class="wrapper">
<div class="container">
  <h2 class="text-center">Товар</h2>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">Фото</th>
      <th scope="col">Описание</th>
      <th scope="col">Цена</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"><a href=""><button type="submit" class="btn btn-primary">Редактировать</button></a></td>
      <td class="align-middle">
      <form action="" method="POST">
                        @csrf
                        <!-- @method('DELETE')   -->
                        
      <button type="submit" class="btn btn-danger">Удалить</button>
      </form>
    </td>
    </tr>
   
  </tbody>
  </table>
  <hr>
</div>
</div>
