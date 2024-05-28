
<x-x-header />



<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <form method="POST" action='order_create' class="d-flex justify-content-around flex-wrap">
        @csrf
        <div class="Delivery">
            <div class="d-flex flex-column gap-3 Delivery_info">
                <h2 class="fw-bold">Условия доставки</h2>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex gap-1">
                        <img src="/img/fluent-mdl2_street.svg">
                        <input type="search" name="id_street" placeholder="Выберите улицу" class="input_adress" id="tags">
                        <div id="tags_results" class="search-results" style="max-height: 200px; overflow-y: auto;"></div>
                        <p>@error('id_street') {{$message}} @enderror</p>  
                    </div>
                    <div class="d-flex">
                        <img src="/img/home.svg">
                        <input type="text" name="location_details_home" placeholder="Введите дом" class="input_adress" id="location_details">
                        <p>@error('location_details_home') {{$message}} @enderror</p>  
                    </div>
                    <div class="d-flex">
                        <img src="/img/home.svg">
                        <input type="text" name="location_details_appart" placeholder="Введите квартиру" class="input_adress">
                        <p>@error('location_details_appart') {{$message}} @enderror</p> 
                    </div>
                    <input type="text" class="input_commen" placeholder="Комментарий курьеру" id="comment" name="comment">
                    @error('comment') {{$message}} @enderror
                </div>
                <div>
                    <div class="d-flex align-items-center gap-1">
                        <img src="/img/clock.svg">
                        <h2 class="fw-bold" style="margin-top: 8px;">Время доставки</h2>
                    </div>
                    <p class="fw-bold">Доставка за 20-30 минут</p>
                </div>
            </div>
        </div>

        <div class="Delivery">
            <div class="d-flex flex-column gap-2 Delivery_info">
                <h2>Способ оплаты</h2>
                <div class="d-flex flex-column">
                    <div class="d-flex gap-4 align-items-center"> Наличные
                        <label class="switch" style="margin-left: 3px;">
                            <input type="radio" checked name="very" value="Наличные" id="cash_radio">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="d-flex gap-1 align-items-center"> Безналичные
                        <label class="switch">
                            <input type="radio" name="very" value="Безналичные" id="non_cash_radio">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <hr class="fw-bold">
                <div class="total d-flex flex-column gap-4">
                    <p class="fw-bold">Итого: {{ $totalSum }}₽</p>
                    <input type="hidden" value="{{ $totalSum }}" name="amount">
                    <input type="submit" id="submitOrder" class="order_button" value="Оформить заказ">
                </div>
            </div>
        </div>
    </form>
</div>


<script>
$(function() {
    var availableTags = {!! $streetJson !!}; // массив всех улиц
    $("#tags").autocomplete({
        source: availableTags
    });
} ) ;
</script>


<x-footer/>
