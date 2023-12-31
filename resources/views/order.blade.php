
<x-x-header />


    <section class="">
        <div class="container d-flex justify-content-around">
            <div class="d-flex flex-column gap-5">
 <form method="POST" action='order_create'>
    @csrf
                <div class="Delivery">
                                <div class="d-flex flex-column gap-2 Delivery_info">

                          <h2 class="fw-bold">Условия доставки</h2>
                          <div class="Delivery_conditions" > <p>200руб</p> </div>
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex gap-1">
                                        <img src="/img/home.svg">
                         <input placeholder="Что-что" class="input_adress" name="location">
                                 </div>
                         <input class="input_commen" placeholder="Комментарий курьеру" type="text" name="comment">
                             </div>
                                 <div>
                                     <div class="d-flex align-items-center gap-1">
                                        <img src="/img/clock.svg"><h2 class="fw-bold" style="margin-top: 8px;">Время доставки</h2>
                                    </div>
                                        <p class="fw-bold">Доставка за 20-30 минут</p>

                                 </div>
                        </div>
                </div>


                <div class="Delivery order">
                <div class="d-flex flex-column gap-2 Delivery_info">
                        <h2>Способ доставки</h2>
                        <div class="d-flex flex-column">
                                <div class="d-flex gap-4 align-items-center"> Наличные
                                             <label class="switch">
                                            <input type="radio" checked name="very">
                                            <span class="slider round"></span>
                                            </label>
                                            </div>
                                            <div class="d-flex gap-1 align-items-center"> Безналичные
                                    <label class="switch">
                                    <input type="radio" name="very">
                                     <span class="slider round"></span>
                                    </label>
                                            </div>
                        </div>
                        <hr class="fw-bold">
                            <div class="total">
                                <p class="fw-bold">Итого</p>
                                <p>Стоимость заказа: <input type="text" class="cost_order" name="amount"></p>
                                <input type="submit" class="order_button" value="Оформить заказ">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </form>
    </section>

    <script>
        let price = document.getElementById("price");
        let sum = document.getElementById("sum");
        let numericUpDown = document.getElementById("numericUpDown");
        let up = document.getElementById("up");
        let down = document.getElementById("down");
        up.onclick = () => {
            numericUpDown.value = (isNaN(numericUpDown.value)) ? 1 : +numericUpDown.value + 1;
            setSum();
        };
        down.onclick = () =>{
            numericUpDown.value = (numericUpDown.value) > 0 ? +numericUpDown.value - 1 : 0;
            setSum();
        }

        numericUpDown.oninput = setSum;

        function setSum() {
            sum.innerText = (price.innerText * numericUpDown.value)
        }
    </script>
<x-footer/>
