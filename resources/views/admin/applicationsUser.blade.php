@include('admin.inc.sidebar')
<x-alerts/>
<div class="wrapper">
<div class="container">
  <h2 class="text-center">Заявки на добавление заведения</h2>
  <div>
    <p>Фильтр</p>
    <div>
        <a href="/admin/1/applicationsUser">Новые</a>
        <a href="/admin/2/applicationsUser">Принято</a>
        <a href="/admin/3/applicationsUser">Отклоненно</a>
    </div>
  </div>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ФИО</th>
      <th scope="col">Телефон</th>
      <th scope="col">Название</th>
      <th scope="col">Лицензия</th>
      <th scope="col">Категория</th>
      <th scope="col">Местоположение</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($applications as $application)
    <tr>
      <td class="align-middle fw-bold">{{$application->id}}</td>
      <td class="align-middle fw-bolder">{{$application->name}}.{{$application->surname}}.{{$application->patronymic}}</td>
      <td class="align-middle">{{$application->phone}}</td>
      <td class="align-middle">{{$application->title}}</td>
      <td class="align-middle">
      @if($application->document)
            <a href="{{ asset('storage/img/' . $application->document) }}" class="btn btn-primary" download>Скачать документ</a>
        @endif  
    </td>
      <td class="align-middle">{{$application->id_categoriesCafe}}</td>
      <td class="align-middle">{{$application->location}}</td>
      @if ($application->id_status == 1)
      <td class="align-middle"><a class="btn btn-success" href="/{{$application->id}}/applicationAccepted">Принять</a></td>
      <td class="align-middle"><a class="btn btn-danger" href="/{{$application->id}}/applicationDeviation">Отклонить</a></td>
      @endif
    </tr>
    @endforeach
   
  </tbody>
  </table>

  <hr>
</div>
</div>
<script>

setTimeout(function(){
    document.getElementById('message').style.display = 'none';
  }, 5000);

  </script>
