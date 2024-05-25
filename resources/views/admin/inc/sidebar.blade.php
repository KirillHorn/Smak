    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href="/style/style1.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="edit-update-categories-url-base" content="{{ route('edit.update.categories', ['id' => 'id']) }}">

<link href="/style/sidebars.css" rel="stylesheet">
<style>
  

</style>
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
            <li><a href="/admin/1/applicationsCourier" class="link-dark rounded">Заявки курьера</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#brench-collapse" aria-expanded="true">
          Филиал
        </button>
        <div class="collapse show" id="brench-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/admin/serviceBrech" class="link-dark rounded">Добавить филиал</a></li>
            <li><a href="/admin/serviceEdit" class="link-dark rounded">Редактирование филиала</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#product-collapse" aria-expanded="true">
          Блюда
        </button>
        <div class="collapse show" id="product-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/admin/serviceRedactProduct" class="link-dark rounded">Добавить блюдо</a></li>
            <li><a href="/admin/serviceEditProduct" class="link-dark rounded">Редактирование блюд</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#categories-collapse" aria-expanded="true">
          Категории продукции
        </button>
        <div class="collapse show" id="categories-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/admin/EditCategories" class="link-dark rounded">Добавить категорию</a></li>
          </ul>
        </div>
        <div class="collapse show" id="categories-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/admin/CategoriesEdit" class="link-dark rounded">Редактирование категории</a></li>
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
