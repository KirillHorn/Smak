<x-x-header />
<section class="container">
    <div class="d-flex order_info justify-content-between">
        <div class="d-flex flex-column order_info_one ">
        <h3>Заказ {{$order->id}}</h3>
        <p><span>ФИО:</span> {{$order->user->name}} {{$order->user->name}}</p>
        <p><span>Цена заказа:</span> {{$order->amount}}₽</p>
        <p><span>Комментарий заказа:</span> {{$order->comment}}</p>
        <p><span>Адрес доставки:</span> {{$order->location}}</p>
        <p><span>Способ оплаты:</span> {{$order->paymant}}</p>
        @if ($order->id_status == 1)
        
        <a class="courier_button" href="{{ route('courier', ['id' => $order->id]) }}">Принять</a>
        @elseif ($order->id_status == 2)
        <a class="courier_button" href="{{ route('courier.completed', ['id' => $order->id]) }}">Завершить</a>
        @elseif ($order->id_status == 3)
        <p style="margin: 0 auto; font-size:24px;"><span>Вы завершили заказ!</span></p>
        @endif
        </div>
        <div class="order_info_product">
            <h3>Продукты заказа</h3>
            <table class="table">
            <thead style="border-bottom: 1px solid #A408A7;">
                <tr>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th>Количество</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($orders_products as $products)
                <tr>
                    <td><img src="/storage/img/{{$products->product_order->img}}" alt="Image" width="60" height="60"></td>
                    <td>{{$products->product_order->title}}</td>
                    <td>{{$products->count}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

         
       
        </div>
    </div>

</section>
<x-footer />


