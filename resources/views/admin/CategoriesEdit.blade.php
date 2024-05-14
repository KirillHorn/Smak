@include('admin.inc.sidebar')
<x-alerts/>
<div class="wrapper">
<div class="container">
  <h2 class="text-center">Категория: редактирование</h2>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название категории</th>
      <th scope="col">Количество блюд</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($Categories as $Categoriess)
    <tr>
    <td class="align-middle fw-bold">{{$Categoriess->id}}</td>
       <td class="align-middle fw-bold">{{$Categoriess->title}}</td>
       <td class="align-middle fw-bold">{{$Categoriess->count_product()}}</td>
    <td class="align-middle">
    <button type="button" class="button_change" data-bs-toggle="modal" data-bs-target="#updateCategoria" data-bs-whatever="@mdo"  data-id="{{ $Categoriess->id }}"
                                    data-title="{{ $Categoriess->title }}">Изменить</button>
    </td>
    </tr>
    @endforeach
  </tbody>
  </table>

  <div class="modal fade" id="updateCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" style="color: #A408A7;" id="exampleModalLabel">Редактировать данные</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="updateForm" class="forma_register d-flex justify-content-center flex-column align-items-center">
          @csrf
          @method('PATCH')
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text_label">Название</label>
            <input type="text" name="title" id="modalTitle" placeholder=" @error('title') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <span> @error('title') {{$message}} @enderror</span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          <input type="submit" value="Изменить данные" class="btn btn-primary ">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

        
  {{ $Categories->withQueryString()->links('pagination::bootstrap-5') }}
  <hr>
</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
  var buttons = document.querySelectorAll(".button_change");
  buttons.forEach(function(button) {
    button.addEventListener("click", function() {
      var id = button.dataset.id;
      var title = button.dataset.title;

      document.getElementById("modalTitle").value = title;
      document.getElementById("updateForm").action = '/admin/categories_update/' + id;

      var myModal = new bootstrap.Modal(document.getElementById('myModal'));
      myModal.show();
    });
  });
});

setTimeout(function(){
    document.getElementById('message').style.display = 'none';
  }, 5000);

  </script>
