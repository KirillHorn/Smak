<x-x-header />
<style>
     .order_info_product .table-product tbody tr {
        display: table-row;
    }
    .order_info_product .table-product tbody tr:nth-child(n+6) {
        display: none;
    }
</style>

<div class="container">
    <div class="d-flex order_info justify-content-between flex-wrap">
        <div class="d-flex flex-column order_info_one">
            <h3>Заказ {{$orders_user->id}}</h3>
            <p><span>Цена заказа:</span> {{$orders_user->amount}}₽</p>
            <p><span>Комментарий заказа:</span>
            @if (!empty($orders_user->comment))
    {{$orders_user->comment}}
@else
    Отсуствует
@endif
        </p>
            <p><span>Адрес доставки:</span> {{$orders_user->street->title_street}}.</p>
            <p><span>Дом/Квартира:</span> {{$orders_user->location_details}}.</p>
            <p><span>Способ оплаты:</span> {{$orders_user->paymant}}.</p>
            <p><span>Статус заказа:</span> {{$orders_user->status->title}}.</p>
        </div>
        <div class="order_info_product">
            <h3>Продукты заказа</h3>
            <div class="table-responsive">
                <table class="table table-product">
                    <thead style="border-bottom: 1px solid #A408A7;">
                        <tr>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders_products as $products)
                        <tr>
                            <td><img src="/storage/img/{{$products->product_order->img}}" alt="Image" width="60" height="60"></td>
                            <td>{{$products->product_order->title}}</td>
                            <td>{{$products->product_order->cost}}₽</td>
                            <td>{{$products->count}}</td>
                            <td><a href="/goods/{{$products->product}}">Подробнее</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-3">
                <button id="toggleButton" class="btn btn_toggle" style="display: none;">Развернуть всё</button>
            </div>
        </div>
    </div>
</div>
<x-footer />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function(){
        var rows = $(".order_info_product .table-product tbody tr").length;

        // Show the button only if there are 6 or more rows
        if (rows >= 6) {
            $("#toggleButton").show();
        }

        $("#toggleButton").click(function(){
            var buttonText = $(this).text();
            if (buttonText === "Развернуть всё") {
                $(".order_info_product .table-product tbody tr:nth-child(n+6)").css('display', 'table-row');
                $(this).text("Свернуть");
            } else {
                $(".order_info_product .table-product tbody tr:nth-child(n+6)").css('display', 'none');
                $(this).text("Развернуть всё");
            }
        });
    });
</script>