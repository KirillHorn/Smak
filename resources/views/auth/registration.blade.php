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
    <label for="surname" class="form-label">Фамилия</label>
    <input type="text" name="surname" value="{{ old('surname') }}" class="form-control @error('surname') is-invalid @enderror" id="surname" aria-describedby="surnameHelp">
    @error('surname')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label text_label">Имя</label>
    <input type="text" name="name" value="{{ old('name') }}"  class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp">
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="patronymic" class="form-label">Отчество</label>
    <input type="text" name="patronymic" value="{{ old('patronymic') }}" class="form-control @error('patronymic') is-invalid @enderror" id="patronymic" aria-describedby="patronymicHelp">
    @error('patronymic')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Электронная почта</label>
    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Номер телефона</label>
    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="phone" aria-describedby="phoneHelp">
    @error('phone')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="password" class="form-label">Пароль</label>
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
    @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="confirm_password" class="form-label">Повторите пароль</label>
    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password">
    @error('confirm_password')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

      <input type="submit" value="Регистрация" class="btn btn-primary input_auth">
    </form>
  </div>
</section>

<x-footer />
