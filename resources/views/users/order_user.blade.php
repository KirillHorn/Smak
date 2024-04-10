<x-x-header />
<section class="container">
    <div class="d-flex order_info justify-content-between">
        <div class="d-flex flex-column order_info_one ">
        <h3>Заказ {{$orders_user->id}}</h3>
        <p><span>Цена заказа:</span> {{$orders_user->amount}}₽</p>
        <p><span>Комментарий заказа:</span> {{$orders_user->comment}}</p>
        <p><span>Адрес доставки:</span> {{$orders_user->location}}</p>
        <p><span>Способ оплаты:</span> {{$orders_user->paymant}}</p>
        </div>
        <div class="order_info_product">
            <h3>Продукты заказа</h3>
            <table class="table">
            <thead style="border-bottom: 1px solid #A408A7;">
                <tr>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($orders_products as $products)
                <tr>
                    <td><img src="/storage/img/{{$products->product_order->img}}" alt="Image" width="60" height="60"></td>
                    <td>{{$products->product_order->title}}</td>
                    <td>{{$products->product_order->cost}}₽</td>
                    <td><a href="/goods/{{$products->product}}">Подробнее</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

         
       
        </div>
    </div>
</section>
<x-footer />


