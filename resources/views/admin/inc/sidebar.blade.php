    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="/style/style1.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="/style/sidebars.css" rel="stylesheet">
<section class="sidebar ">
    <div class="flex-shrink-0 p-3 bg-white sidebar_bacg" style="width: 280px;">
    <div class="d-flex align-items-center pb-1 mb-1 link-dark text-decoration-none">
      <span class="fs-5 fw-semibold">Добро пожаловать    <span style="color: #A408A7;">{{Auth::user()->name}}<span> </span>
    </div>
    <!-- <div class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom" >
      <span class="fs-7 ">tITLE</span>
    </div> -->
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
        Заявки
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/admin/1/applicationsUser" class="link-dark rounded">Заявки модератора</a></li>
            <li><a href="/admin/1/applicationsCourier" class="link-dark rounded">Заявки курьера</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#product-collapse" aria-expanded="true">
          Заведения
        </button>
        <div class="collapse show" id="product-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/admin/serviceRedact" class="link-dark rounded">Добавить заведения</a></li>
            <li><a href="/admin/serviceEdit" class="link-dark rounded">Редактирование заведения</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="true">
          Аккаунт
        </button>
        <div class="collapse show" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/signout" class="link-dark rounded">Выйти из аккаунта</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
  </section>
<script src="/script/sidebars.js"></script>
