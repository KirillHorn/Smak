
<x-x-header />


    <section>
        <div class="container d-flex flex-column gap-3">
              <div class="d-flex tumbler">
                <div class="a_reg">
                <a>Регистрация</a>
                </div>
                <div class="a_aut">
                <a href="/auth">Вход</a>
                </div>
              </div>
                <h2 class="h2_auth fw-bold" >РЕГИСТРАЦИЯ</h2>
                <form class="forma_auth d-flex justify-content-center flex-column align-items-center">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label text_label">Имя</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Фамилия</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Отчество</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Номер телефона</label>
    <input type="text" class="form-control" id="tel" aria-describedby="emailHelp" placeholder="+ _ (_ _ _) _ _ _ - _ _ - _ _">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Дата рождения</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary ">Регистрация</button>
</form>
        </div>
    </section>
 
<x-footer/>