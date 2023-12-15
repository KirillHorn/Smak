
<x-x-header />


    <section class="">
        <div class="container d-flex justify-content-around">
            <div class="d-flex flex-column gap-5">

         

                  <div class="Delivery">  
                         <div class="basket">
                              <div>
                                 <h2 class="fw-bold">Корзина</h2>           
                              </div>
                                    <div class="d-flex flex-column">
                                    @if (session()->missing('basket'))
                        <li class="nav-item nav-item-cost">
                            <h4>Ты чего то ждешь?</h4>
                        </li>
                    @else
            @forelse (session('basket') as $item)
                                        <div class="basket_product d-flex gap-3 align-items-center justify-content-around">

                                            <img src="/storage/img/{{$item->img}}"> <p class="fw-bold" >{{ $item->title}} </p>  <p id="price">195</p>  
                                            <!-- {{-- <div class="text-center">+ 1 - </div> --}} -->
                                            <p class="text-center Sum_Button fw-bold"> {{ $item ->cost}} </p>
                                         
                                            <div class="counter d-flex gap-1 justify-content-evenly align-items-center">
                                            <input id="down" type="button" class="input_count" value="-">
                                            <input id="numericUpDown" type="number" value="1" class="count"/>
                                      
                                            <input id="up" type="button" class="input_count" value="+">
                          
                                            </div>
                     
                                            
                                        </div>
                                        @empty
                         @endforelse
                                <div class="d-flex  justify-content-between align-items-center "> <h2>Сумма корзины</h2>  </div>
                            <div class="d-flex alight-items-center "> <a class="button_basket_a" href="/order"> Оформление заказа</a></div>           
                         </div>
                        
                     </div>
                 </div>
            </div>
            @endif  
          
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