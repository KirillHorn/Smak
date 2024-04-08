<x-x-header />


<section class="">
    <div class="container d-flex justify-content-around">
        <div class="d-flex flex-column basket_main">
            <div class="d-flex justify-content-between flex-align-center basket_title">
                <h3>Корзина</h3><button class="button_delete_all"></button>
            </div>
            
         
            <table class="table table-borderless table_product">
                <thead style="border-bottom: 1px solid #A408A7;">
                @if(!$basket)
                    <tr>
                        <th scope="col" class="border-0" style="width: 8%;"></th>
                        <th scope="col" class="border-0" style="width: 50%;">Наименование</th>
                        <th scope="col" class="border-0" style="width: 32%;">Цена</th>
                        <th scope="col" class="border-0" style="width: 10%;">Количество</th>
                    </tr>
                    @endif
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
                        <td class="secret_cost">{{$item->cost}}</td>
                  
                     
                  
                        <td style="vertical-align: middle; text-align: center;">
                            <div class="counter d-flex gap-1 justify-content-evenly align-items-center">
                                <button id="down">-</button>
                                <input id="numericUpDown" type="number" value="1" class="count" />
                                <button id="up">+</button>
                            </div>
                        
                        </td>
                        <td style="vertical-align: middle; text-align: center;">  <a href="/baskets_delete" class="product_delete"></a>  </td>
                    </tr>
                    @empty
                <tr>
                    <div class="text-center basket_null">Корзина пуста</div></tr>
                @endforelse
                </tbody>

            </table>
        
  
           
            <div style="margin: 10px auto;">
                <a class="button_add" href="/product">+</a>
            </div>

      

       
        </div>
        <div class="d-flex flex-column order_product ">
            <p class="d-flex gap-5 justify-content-center" >В корзине 1 товар<span id="sum"></span></p>
            <a href="/order">Перейти к оформлению</a>
        </div>
    </div>

</section>

    <script>
        /*
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
        } */
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
        }
        updateSum();
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
            });
        });
    
    
 
        
    </script>
<x-footer />