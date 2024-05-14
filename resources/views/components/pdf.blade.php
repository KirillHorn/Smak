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
  
  

</head>
<body>
<div class="d-flex flex-column user_orders">
            <h2 style="text-align: center; color:#000 ; font-family: DejaVu Sans;">Ваши заказы</h2>
            <table class="table table-borderless table_product table_">
  <thead style="border-bottom: 1px solid #A408A7;">
    <tr class="table_product_tr">
      <th scope="col" style="font-family: DejaVu Sans;">Номер</th>
      <th scope="col" style="font-family: DejaVu Sans;">Цена</th>
      <th scope="col" style="font-family: DejaVu Sans;">Адрес</th>
      <th scope="col" style="font-family: DejaVu Sans;">Комментарий</th>
      <th scope="col" style="font-family: DejaVu Sans;">Клиент</th>
      <th scope="col" style="font-family: DejaVu Sans;">Дата</th>
      <th scope="col" style="font-family: DejaVu Sans;">Выручка</th>

    </tr>
  </thead>
  <tbody>
  @foreach ($orders as $orderss)
    <tr class="table_product_tr">
      <th scope="row">{{$orderss->order_user->id}}</th>
      <td style="font-family: DejaVu Sans;">{{$orderss->order_user->amount}}₽</td>
      <td style="font-family: DejaVu Sans;">{{$orderss->order_user->location}}</td>
      <td style="font-family: DejaVu Sans;">{{$orderss->order_user->comment}}</td>
      <td style="font-family: DejaVu Sans;">{{$orderss->order_user->user->name}}</td>
      <td style="font-family: DejaVu Sans;">{{$orderss->order_user->created_at}}</td>
      <td style="font-family: DejaVu Sans;">100Р</td>
    </tr>
    @endforeach
</table>
         
            
        </div>
        </body>
        </html>