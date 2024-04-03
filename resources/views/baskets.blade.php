<x-x-header />


<section class="">
    <div class="container d-flex justify-content-around">
        <div class="d-flex flex-column basket_main">
            <div class="d-flex justify-content-between flex-align-center basket_title">
                <h3>Корзина</h3><button class="button_delete_all"></button>
            </div>
            <table class="table table-borderless table_product">
                <thead style="border-bottom: 1px solid #A408A7;">
                    <tr>
                        <th scope="col" class="border-0" style="width: 8%;"></th>
                        <th scope="col" class="border-0" style="width: 50%;">Наименование</th>
                        <th scope="col" class="border-0" style="width: 32%;">Цена</th>
                        <th scope="col" class="border-0" style="width: 10%;">Количество</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="product_basket_one">
                        <td style="vertical-align: middle; text-align: center;"><img src="https://via.placeholder.com/50" alt="Фото товара"></td>
                        <td style="vertical-align: middle;">Товар 1</td>
                        <td style="vertical-align: middle; font-size:16px;">185</td>
                        <td style="vertical-align: middle; text-align: center;">
                            <div class="counter d-flex gap-1 justify-content-evenly align-items-center">
                                <button>-</button>
                                <input id="numericUpDown" type="number" value="1" class="count" />
                                <button>+</button>
                            </div>
                        
                        </td>
                        <td style="vertical-align: middle; text-align: center;">  <a href="/baskets_delete" class="product_delete">a</a>  </td>
                    </tr>
                </tbody>
            </table>
            <div style="margin: 10px auto;">
                <a class="button_add">+</a>
            </div>

            @foreach ($basket as $item)

            @endforeach
        </div>
        <div class="d-flex flex-column order_product ">
            <p class="d-flex gap-5 justify-content-center" >В корзине 1 товар<span>195₽</span></p>
            <a href="/order">Перейти к оформлению</a>
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
<x-footer />