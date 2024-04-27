<x-x-header/>
<x-alerts/>
<div class="container">
    <h2 class="h2_auth fw-bold">Заявка на добавление заведения</h2>

    <form method="POST" action="/application_add_validate" enctype="multipart/form-data" class="forma_auth d-flex justify-content-center flex-column " style="margin-bottom: 40px;">
    @csrf
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Имя</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Фамилия</label>
    <input type="text" name="surname" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Отчество</label>
    <input type="text" name="patronymic" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Номер телефона</label>
    <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Название заведения</label>
    <input type="text" name="title" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Фото заведения</label>
    <input type="file" name="img" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Категория заведения</label>
    <select class="form-select select_categories" name="id_categoriesCafe" > 
    @foreach ($categories as $item )
    <option class="option_categories" value="{{ $item->id}}"> {{ $item->title_categories}}</option>
    @endforeach
</select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Местоположение</label>
      <input class="form-control" name="location" placeholder=" @error('location') {{$message}}  @enderror" type="text" >
    </div>
  <button type="submit" class="btn input_auth">Подать заявку</button>
</form>
</div>
<x-footer/>