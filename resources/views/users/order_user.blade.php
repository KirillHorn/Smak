<x-x-header />
<section class="container">
    <div class="d-flex">
     
        <div>
        <h2>Заказ {{$orders_user->id}}</h2>
        <p>Цена заказа: {{$orders_user->amount}}</p>
        <p>Комментарий заказа: {{$orders_user->comment}}</p>
        <p>Адрес доставки: {{$orders_user->location}}</p>
        <p>Способ оплаты: {{$orders_user->paymant}}</p>
        </div>
        <div>
            <h3>Состав заказа</h3>
            @foreach ($orders_products as $products)
            <p>{{$products->product_order->title}}</p>
            <p>Цена:</p>
            <img>
            @endforeach
        </div>
    </div>
</section>
<x-footer />


