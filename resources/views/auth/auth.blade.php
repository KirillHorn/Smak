<x-x-header />


<section>
  <div class="container d-flex flex-column gap-3">
    <div class="d-flex tumbler">
      <div class="a_reg">
        <a href="/auth/registration" class="decoration-none">Регистрация</a>
      </div>
      <div class="a_aut">
        <a class="decoration-none">Вход</a>
      </div>
    </div>
    @if (session("error"))
    {{session("error")}}
    @endif
    <h2 class="h2_auth fw-bold">ВХОД</h2>

    <!-- <form method="POST" action="/auth_valid" class="forma_auth d-flex justify-content-center flex-column align-items-center">
 @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
    <input type="email" name="email" value="{{old('email')}}"  placeholder="  @error('email') {{$message}}  @enderror"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" name="password" value="{{old('password')}}"  placeholder="  @error('password') {{$message}}  @enderror"  class="form-control" id="exampleInputPassword1">
  </div>
 

  <input type="submit" class="btn btn-primary" value="Войти">
            </form> -->

    <form method="POST" action="/auth_valid" class="forma_auth d-flex justify-content-center flex-column align-items-center">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
     

      <input type="submit" value="Войти" class="btn btn-primary ">
    </form>

  </div>
</section>

<x-footer />