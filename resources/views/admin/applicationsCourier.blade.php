@include('admin.inc.sidebar')
<x-alerts/>
<div class="wrapper">
<div class="container">
  <h2 class="text-center">Заявки на добавление курьера</h2>
  <div>
    <div class="d-flex justify-content-center gap-1 filtr">
        <a href="/admin/1/applicationsCourier" class="btn">Новые</a>
        <a href="/admin/2/applicationsCourier" class="btn">Принято</a>
        <a href="/admin/3/applicationsCourier" class="btn">Отклоненно</a>
    </div>
  </div>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ФИО</th>
      <th scope="col">Телефон</th>
      <th scope="col">Электронная</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($application_courier as $application)
    <tr>
      <td class="align-middle fw-bold">{{$application->id}}</td>
      <td class="align-middle fw-bolder">{{$application->name}}.{{$application->surname}}.{{$application->patronymic}}</td>
      <td class="align-middle">{{$application->phone}}</td>
      <td class="align-middle">{{$application->email}}</td>
      @if ($application->id_status == 1)
      <td class="align-middle"><a class="btn btn-success" href="/{{$application->id}}/applicationAcceptedCourier">Принять</a></td>
      <td class="align-middle"><a class="btn btn-danger" href="/{{$application->id}}/applicationDeviationCourier">Отклонить</a></td>
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
