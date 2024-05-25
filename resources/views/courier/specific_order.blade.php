<x-x-header />
<section class="container">
    <div class="d-flex order_info justify-content-between">
        <div class="d-flex flex-column order_info_one ">
        <h3>Заказ {{$order->id}}</h3>
        <p><span>ФИ:</span>{{$order->user->surname}}.{{$order->user->name}}</p>
        <p><span>Цена заказа:</span> {{$order->amount}}₽</p>
        <p><span>Комментарий заказа:</span>
        @if (!empty($order->comment))
    {{$order->comment}}
@else
    Отсуствует
@endif
        </p>
        <p><span>Адрес доставки:</span> {{$order->street->title_street}}</p>
        <p><span>Способ оплаты:</span> {{$order->paymant}}</p>
        <p><span>Адрес филиала:</span>{{ $order->branch_street }}</p>
        @if ($order->id_status == 1)
        <a class="courier_button" href="{{ route('courier', ['id' => $order->id]) }}" onclick="startTimer()">Принять</a>
        @elseif ($order->id_status == 2)
        <div id="timer">00:00:00</div>
        <a class="courier_button" href="{{ route('courier.completed', ['id' => $order->id]) }}" onclick="stopTimer()">Завершить</a>
        @elseif ($order->id_status == 3)
        <p><span>Время выполнения заказа:</span>{{ $order->difference }}</p>
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
<script>
  
    let timerInterval;

    function startTimer(orderId) {
        const startTime = new Date();
        localStorage.setItem('startTime_' + orderId, startTime);
        updateTimer(orderId);
        timerInterval = setInterval(() => updateTimer(orderId), 1000);
    }

    function stopTimer(orderId) {
        clearInterval(timerInterval);
        localStorage.removeItem('startTime_' + orderId);
        let endTime = new Date();

        fetch(`/${orderId}/courier_order_completed`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ end_time: endTime })
        }).then(response => {
            if (response.ok) {
                window.location.reload();
            } 
        }).catch(error => {
            console.error('Ошибка:', error);
            alert('Ошибка завершения заказа');
        });
    }

    function updateTimer(orderId) {
        const startTime = new Date(localStorage.getItem('startTime_' + orderId));
        if (!startTime) return;

        const now = new Date();
        const elapsedTime = new Date(now - startTime);
        const hours = String(elapsedTime.getUTCHours()).padStart(2, '0');
        const minutes = String(elapsedTime.getUTCMinutes()).padStart(2, '0');
        const seconds = String(elapsedTime.getUTCSeconds()).padStart(2, '0');
        document.getElementById('timer').innerText = `${hours}:${minutes}:${seconds}`;
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        const orderId = {{ $order->id }};
        if (localStorage.getItem('startTime_' + orderId)) {
            timerInterval = setInterval(() => updateTimer(orderId), 1000);
        }
    });

    @if ($order->id_status == 2)
        document.addEventListener('DOMContentLoaded', () => {
            const orderId = {{ $order->id }};
            if (!localStorage.getItem('startTime_' + orderId)) {
                startTimer(orderId);
            }
        });
    @endif
</script>
<x-footer />


