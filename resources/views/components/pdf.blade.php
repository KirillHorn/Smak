<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/style/bootstrap.min.css" rel="stylesheet">
    <link href="/style/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="/script/bootstrap.min.js"></script>
    <script src="/script/bootstrap.bundle.min.js"></script>
    <script src="/script/bootstrap.esm.min.js"></script>
    <script src="/script/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .table {
          height: 50%;
          width: 100%;
        }
        h2 {
          font-family: DejaVu Sans;
  
        }
        .table_product_tr_br {
          background-color: #000;
          color: #fff;
          font-size: 10px;
        }
        .table_product_tr {
  
        }
        .table th, .table td {
            font-family: DejaVu Sans;
            font-size: 12px;
            text-align: center;
            position: relative;
        }

        .thead_pdf {
            background-color: #000;
            color: #fff;
        }
        .info_courier_table {
          width: 40%;
          border-radius: 20px;
          font-size: 14px;
          margin-bottom: 10px;
          color: ;
        }
        .table_widt {
         
        }
    </style>
  

</head>
<body>
<div class="container mt-5">
<div class="d-flex flex-column" style="margin-bottom: 0px;">
            <h2 style="">Ваши заказы</h2>
            <div class="d-flex info_courier_table">
              <p style="font-family: DejaVu Sans;">Всего выполнено заказов:<span>{{ $orders->count() }}</span></p>
              <p style="font-family: DejaVu Sans;">Вы заработали: <span>{{ $orders->count() * 100 }}₽</span></p>
            </div>
            <table class="table table-borderless table_product table_">
  <thead style="border-bottom: 1px solid #000;">
    <tr class="table_product_tr_br">
      <th scope="col">Номер</th>
      <th scope="col">Адрес</th>
      <th scope="col">Комментарий</th>
      <th scope="col">Клиент</th>
      <th scope="col">Дата</th>
      <th scope="col">Выручка</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($orders as $orderss)
    <tr class="table_product_tr">
      <th scope="row">{{$orderss->order_user->id}}</th>
      <td>{{$orderss->order_user->street->title_street}}</td>
      <td>
      @if (!empty($orderss->order_user->comment))
    {{$orderss->order_user->comment}}
@else
    Отсуствует
@endif
      <td>{{$orderss->order_user->user->name}}</td>
      <td>{{$orderss->order_user->created_at->format('d.m.Y')}}</td>
      <td>100₽</td>
    </tr>
    @endforeach
</table>
</div>
        </body>
        </html>