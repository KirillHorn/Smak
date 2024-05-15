
<x-x-header />



        <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
 <form method="POST" action='order_create ' class="d-flex justify-content-around flex-wrap">
    @csrf
                <div class="Delivery">
                                <div class="d-flex flex-column gap-3 Delivery_info">

                          <h2 class="fw-bold">Условия доставки</h2>
                     
                                <div class="d-flex flex-column gap-3">
                                    <div class="d-flex gap-1">
                                        <img src="/img/home.svg">
                         <input type="text" placeholder="Адрес" class="input_adress" name="location">
                         @error('location') {{$message}}  @enderror
                                 </div>
                         <input type="text" class="input_commen" placeholder="Комментарий курьеру" type="text" name="comment">
                         @error('comment') {{$message}}  @enderror
                             </div>
                                 <div>
                                     <div class="d-flex align-items-center gap-1">
                                        <img src="/img/clock.svg"><h2 class="fw-bold" style="margin-top: 8px;">Время доставки</h2>
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
                                      <input type="radio" checked name="very"  value="Наличные">
                                    <span class="slider round"></span>
                                    </label>
                                </div>
                                            <div class="d-flex gap-1 align-items-center"> Безналичные
                                    <label class="switch">
                                    <input type="radio" name="very" value="Безналичные">
                                     <span class="slider round"></span>
                                    </label>
                                            </div>
                        </div>
                        <hr class="fw-bold">
                            <div class="total d-flex flex-column gap-4">
                                <p class="fw-bold">Итого: {{ $totalSum }}₽</p>
                                <input type="hidden" value="{{ $totalSum }}" name="amount">
                                <input type="submit" class="order_button" value="Оформить заказ">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </form>


    <script>
        // let price = document.getElementById("price");
        // let sum = document.getElementById("sum");
        // let numericUpDown = document.getElementById("numericUpDown");
        // let up = document.getElementById("up");
        // let down = document.getElementById("down");
        // up.onclick = () => {
        //     numericUpDown.value = (isNaN(numericUpDown.value)) ? 1 : +numericUpDown.value + 1;
        //     setSum();
        // };
        // down.onclick = () =>{
        //     numericUpDown.value = (numericUpDown.value) > 0 ? +numericUpDown.value - 1 : 0;
        //     setSum();
        // }

        // numericUpDown.oninput = setSum;

        // function setSum() {
        //     sum.innerText = (price.innerText * numericUpDown.value)
        // }
    </script>
<x-footer/>
