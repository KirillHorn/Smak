
<x-x-header />


    <section class="">
        <div class="container d-flex justify-content-around">
            <div class="d-flex flex-column gap-5">

                <div class="Delivery">
                                <div class="d-flex flex-column gap-2 Delivery_info">

                          <h2 class="fw-bold">Условия доставки</h2>
                          <div class="Delivery_conditions" > <p>200руб</p> </div>
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex gap-1"> 
                                        <img src="/img/home.svg">
                         <input placeholder="Что-что" class="input_adress">
                                 </div>
                         <input class="input_commen" placeholder="Комментарий курьеру">
                             </div>
                                 <div>
                                     <div class="d-flex">
                                        <img src="/img/clock.svg"><h2 class="fw-bold">Время доставки</h2>
                                    </div>
                                        <p class="fw-bold">Доставка за 20-30 минут</p>

                                 </div>
                        </div>
                </div>

                  <div class="Delivery">  
                         <div class="basket">
                              <div>
                                 <h2 class="fw-bold">Корзина</h2>           
                              </div>
                                    <div class="d-flex flex-column">
                                        <div class="basket_product d-flex gap-3 align-items-center justify-content-around">
                                            <img src="/img/66e1608c038e458e7185685a45251707.jpg"> <p class="fw-bold" >Рамен горящего города </p>  <p id="price">195</p>  
                                            <!-- {{-- <div class="text-center">+ 1 - </div> --}} -->
                                            <div class="counter d-flex gap-1 justify-content-evenly align-items-center">
                                            <input id="down" type="button" class="input_count" value="-">
                                            <input id="numericUpDown" type="number" value="1" class="count"/>
                                      
                                            <input id="up" type="button" class="input_count" value="+">
                                            </div>
                                            
                                        </div>

                                    <div class="basket_product d-flex gap-3 align-items-center justify-content-around">
                                            <img src="/img/66e1608c038e458e7185685a45251707.jpg"> <p class="fw-bold" >Рамен горящего города </p>  <p id="price">195</p>  
                                            <!-- {{-- <div class="text-center">+ 1 - </div> --}} -->
                                        <div class="counter d-flex gap-1 justify-content-evenly align-items-center">
                                            <input id="down" type="button" class="input_count" value="-">
                                            <input id="numericUpDown" type="number" value="1" class="count"/>
                                            <input id="up" type="button" class="input_count" value="+">
                                         </div> 
                                     </div>
                                <div class="d-flex  justify-content-between align-items-center "> <h2>Сумма корзины</h2> <p id="sum" class="text-center Sum_Button fw-bold">195 </p> </div>
                            <div class="d-flex alight-items-center gap-2"> Промокод <input type="text" class="input_prom"><button class="button_prom">Применить</button></div>           
                         </div>
                     </div>
                 </div>
            </div>

            <div>
                <div class="Delivery order">
                <div class="d-flex flex-column gap-2 Delivery_info">
                        <h2>Способ доставки</h2>
                        <div class="d-flex flex-column">
                            <label>Наличные<input type="checkbox"></label>
                            <label>Безналичные<input type="checkbox"></label>
                        </div>
                        <hr>
                            <div>
                                <p>Итого</p>
                                <p>Стоимость заказа: <span>500</span></p>
                                <button>Оформить заказ</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
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