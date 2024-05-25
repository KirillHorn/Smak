<x-x-header />
<x-alerts/>


<section>
  <div class="container d-flex flex-column gap-3">
    @if (session("error"))
    {{session("error")}}
    @endif
    <h2 class="h2_auth fw-bold">Стать курьером</h2>
    <form method="POST" action="/registration_courier" class="forma_auth d-flex justify-content-center flex-column" style="margin-bottom: 40px;">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Фамилия</label>
        <input type="text" name="surname" value="{{old('surname')}}" placeholder=" @error('surname') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <span> @error('surname') {{$message}} @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text_label">Имя</label>
        <input type="text" name="name" value="{{old('name')}}" placeholder=" @error('name') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <span> @error('name') {{$message}} @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Отчество</label>
        <input type="text" name="patronymic" value="{{old('patronymic')}}" placeholder=" @error('patronymic') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <span> @error('patronymic') {{$message}} @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <span> @error('email') {{$message}} @enderror</span>
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Номер телефона</label>
        <input type="text" name="phone" value="{{old('phone')}}" placeholder="8(___) ___-____" class="form-control" id="phone" aria-describedby="emailHelp">
        <span> @error('phone') {{$message}} @enderror</span>
      </div>

      <input type="submit" value="Подать заявку" class="btn btn-primary input_auth input_application">
    </form>
  </div>
</section>

<x-footer />
<script>
//Код jQuery, установливающий маску для ввода телефона элементу input
//1. После загрузки страницы,  когда все элементы будут доступны выполнить...
$(function(){
  //2. Получить элемент, к которому необходимо добавить маску
  $("#phone").mask("8(999) 999-9999");
});
</script>