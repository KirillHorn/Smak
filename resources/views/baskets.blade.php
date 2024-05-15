<x-x-header />

<div class="container d-flex justify-content-around" style="margin-top: 30px; margin-bottom:40px;">
    <div class="d-flex flex-column basket_main">
        <div class="d-flex justify-content-between flex-align-center basket_title">
            <h3>Корзина</h3>
        </div>
        <table class="table table-borderless table_product">
            <thead style="border-bottom: 1px solid #A408A7;">
                @auth
                <tr>
                    <th scope="col" class="border-0" style="width: 8%;"></th>
                    <th scope="col" class="border-0" style="width: 50%;">Наименование</th>
                    <th scope="col" class="border-0" style="width: 32%;">Цена|₽</th>
                    <th scope="col" class="border-0" style="width: 10%;">Количество</th>
                    <th scope="col" class="border-0" style="width: 8%;"></th>
                </tr>
                @endauth
            </thead>
            <tbody>
                @forelse ($basket as $item)
                @php
                $count_sum=0;
                $count_sum++;
                @endphp
                <tr class="product_basket_one">
                    <td style="vertical-align: middle; text-align: center;"><img src="/storage/img/{{$item->img}}" alt="Фото товара"></td>
                    <td style="vertical-align: middle;">{{$item->title}}</td>
                    <td style="vertical-align: middle; font-size:16px;" class="hidden_cost d-none">
                        {{$item->cost}}
                    </td>
                    <td style="vertical-align: middle; font-size:16px;" class="secret_cost">{{$item->cost}}</td>
                    <td style="vertical-align: middle; text-align: center;">
                        <form method="POST" action="/baskets_order">
                            @csrf
                            <input type="hidden" name="products[{{ $loop->index }}][id]" value="{{ $item->id }}">
                            <div class="counter d-flex gap-1 justify-content-evenly align-items-center">
                                <p id="down" class="minus" style="display: block;">-</p>
                                <input id="numericUpDown" type="number" name="products[{{ $loop->index }}][count]" value="{{$item->count}}" class="count" />
                                <p id="up" class="plus" style="display: block;">+</p>
                            </div>
                    </td>
                    <td style="vertical-align: middle; text-align: center;" class="d-flex justify-content-center align-items-center">
                        <a href="#" data-id="{{$item->id}}" class="product_delete"></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <div class="text-center basket_null">Корзина пуста</div>
                </tr>
                @endforelse
            </tbody>
        </table>
        @auth
        <div style="margin: 10px auto;">
            <a class="button_add" href="/product">+</a>
        </div>
        @endauth
        @guest
        <div style="margin: 10px auto;">
            <a class="button_add" href="/auth/auth">+</a>
        </div>
        @endguest
    </div>
    <div class="d-flex flex-column order_product">
        <p class="d-flex justify-content-center">В корзине <span id="total_count" style="margin:0px 5px; font-size: 20px;"></span> товара<span id="sum" style="margin-left: 30px;"></span>₽</p>
        <input type="hidden" id="total_sum" name="total_sum" value="0">
        @auth
        <button>Перейти к оформлению</button>
        @endauth
        @guest
        <a href="/auth/auth">Перейти к оформлению</a>
        @endguest
    </div>
</div>
</form>
<script>
    $(document).ready(function() {
  $('.product_delete').on('click', function(e) {
    e.preventDefault();
    
    var id = $(this).data('id');
    var $row = $(this).closest('tr'); 

    $.ajax({
      url: '/' + id + '/baskets_delete',
      type: 'GET',
      data: {
        _token: '{{ csrf_token() }}'
      },
      success: function(response) {
        $row.remove(); 
        alert('Элемент успешно удален.');
      },
      error: function(xhr) {
        alert('Произошла ошибка при удалении элемента.');
      }
    });
  });
});

    const numberInputs = document.querySelectorAll('.secret_cost');
    const resultElement = document.getElementById('sum');
    function updateSum() {
        let sum = 0;
        numberInputs.forEach(function(element) {
            const value = parseFloat(element.textContent);
            if (!isNaN(value)) {
                sum += value;
            }
        });
        resultElement.textContent = sum;
        document.getElementById('total_sum').value = sum;
    }
    updateSum();
    function updateTotalCount() {
        let totalCount = 0;
        const countInputs = document.querySelectorAll('.count');
        countInputs.forEach(function(input) {
            const quantity = parseInt(input.value);
            if (!isNaN(quantity)) {
                totalCount += quantity;
            }
        });
        document.getElementById('total_count').textContent = totalCount;
    }
    updateTotalCount();
    document.querySelectorAll('.count').forEach(input => {
        input.addEventListener('change', function() {
            const productDiv = this.closest('.product_basket_one');
            const priceCount = productDiv.querySelector('.secret_cost');
            const priceElement = productDiv.querySelector('.hidden_cost');
            const price = parseFloat(priceElement.textContent);
            const quantity = parseInt(this.value);
            const totalPrice = price * quantity;
            priceCount.textContent = totalPrice;
            updateSum();
            updateTotalCount();
        });
    });
    document.querySelectorAll('.plus').forEach(plusBtn => {
        plusBtn.addEventListener('click', function() {
            const productDiv = this.closest('.product_basket_one');
            const countInput = productDiv.querySelector('.count');
            const priceElement = productDiv.querySelector('.hidden_cost');
            const priceCount = productDiv.querySelector('.secret_cost');
            let quantity = parseInt(countInput.value);
            quantity++;
            const price = parseFloat(priceElement.textContent);
            const totalPrice = price * quantity;
            countInput.value = quantity;
            priceCount.textContent = totalPrice;
            updateSum();
            updateTotalCount();
        });
    });
    document.querySelectorAll('.minus').forEach(minusBtn => {
        minusBtn.addEventListener('click', function() {
            const productDiv = this.closest('.product_basket_one');
            const countInput = productDiv.querySelector('.count');
            const priceElement = productDiv.querySelector('.hidden_cost');
            const priceCount = productDiv.querySelector('.secret_cost');
            let quantity = parseInt(countInput.value);
            if (quantity > 1) {
                quantity--;
            }
            const price = parseFloat(priceElement.textContent);
            const totalPrice = price * quantity;
            countInput.value = quantity;
            priceCount.textContent = totalPrice;
            updateSum();
            updateTotalCount();
        });
    });
</script>
<x-footer/>