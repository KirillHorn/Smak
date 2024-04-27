<x-x-header />


<section>
  <div class="container d-flex flex-column gap-3">
    <div class="d-flex tumbler">
      <div class="a_reg">
        <a>Регистрация</a>
      </div>
      <div class="a_aut">
        <a href="/auth/auth">Вход</a>
      </div>
    </div>
    @if (session("error"))
    {{session("error")}}
    @endif
    <h2 class="h2_auth fw-bold">РЕГИСТРАЦИЯ</h2>
    <form method="POST" action="/registration_valid" class="forma_auth d-flex justify-content-center flex-column" style="margin-bottom: 40px;">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text_label">Имя</label>
        <input type="text" name="name" value="{{old('name')}}" placeholder=" @error('name') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <span> @error('name') {{$message}} @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Фамилия</label>
        <input type="text" name="surname" value="{{old('surname')}}" placeholder=" @error('surname') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <span> @error('surname') {{$message}} @enderror</span>
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
        <input type="text" name="phone" value="{{old('phone')}}" placeholder="  @error('phone') {{$message}}  @enderror" class="form-control" id="tel" aria-describedby="emailHelp">
        <span> @error('phone') {{$message}} @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" name="password" value="" placeholder=" @error('password') {{$message}}  @enderror" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" name="confirm_password" class="form-label">Повторите пароль</label>
        <input type="password" name="confirm_password" value="" placeholder=" @error('password') {{$message}}  @enderror" class="form-control" id="exampleInputPassword1">
      </div>
      <span> @error('confirm_password') {{$message}} @enderror</span>

      <input type="submit" value="Регистрация" class="btn btn-primary input_auth">
    </form>
  </div>
</section>

<x-footer />