<x-x-header />
<section>
  <div class="container d-flex flex-column gap-3" style="height: 100%">
    <div class="d-flex tumbler">
      <div class="a_reg">
        <a href="/auth/registration" class="decoration-none">Регистрация</a>
      </div>
      <div class="a_aut">
        <a href="/auth/auth" class="decoration-none">Вход</a>
      </div>
    </div>
    <x-alerts/>
    <h2 class="h2_auth fw-bold">ВХОД</h2>
    <form method="POST" action="/auth_valid" class="forma_auth d-flex justify-content-center flex-column ">
      @csrf
      <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
      <input type="submit" value="Войти" class="btn btn-primary input_auth">
    </form>
  </div>
</section>
<script>
       
    </script>
<x-footer />