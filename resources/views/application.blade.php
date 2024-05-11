<x-x-header/>
<x-alerts/>
<div class="container">
    <h2 class="h2_auth fw-bold">Заявка на добавление заведения</h2>

    <form method="POST" action="/application_add_validate" enctype="multipart/form-data" class="forma_auth d-flex justify-content-center flex-column " style="margin-bottom: 40px;">
    @csrf
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Имя</label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
    <span class="invalid-feedback"> @error('name') {{$message}} @enderror</span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Фамилия</label>
    <input type="text" name="surname" value="{{ old('surname') }}" class="form-control @error('surname') is-invalid @enderror" id="exampleInputPassword1">
    <span  class="invalid-feedback"> @error('surname') {{$message}} @enderror</span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Отчество</label>
    <input type="text" name="patronymic" value="{{ old('patronymic') }}" class="form-control @error('surname') is-invalid @enderror" id="exampleInputPassword1">
    <span class="invalid-feedback"> @error('patronymic') {{$message}} @enderror</span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1" >
    <span class="invalid-feedback"> @error('email') {{$message}} @enderror</span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Номер телефона</label>
    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="exampleInputPassword1">
    <span class="invalid-feedback"> @error('phone') {{$message}} @enderror</span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Документ заведения</label>
    <input type="file" name="document" class="form-control @error('document') is-invalid @enderror" id="exampleInputPassword1">
    <span class="invalid-feedback"> @error('document') {{$message}} @enderror</span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Название заведения</label>
    <input type="text" name="title"  value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" id="exampleInputPassword1">
    <span class="invalid-feedback"> @error('title') {{$message}} @enderror</span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Фото заведения</label>
    <input type="file" name="img" class="form-control @error('img') is-invalid @enderror" id="exampleInputPassword1">
    <span class="invalid-feedback"> @error('img') {{$message}} @enderror</span>
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
      <input class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" name="location"  type="text" >
      <span class="invalid-feedback"> @error('location') {{$message}} @enderror</span>
    </div>
  <button type="submit" class="btn input_auth">Подать заявку</button>
</form>
</div>
<x-footer/>