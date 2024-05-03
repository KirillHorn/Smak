<x-x-header />
@if (session ("success"))
<div id="message"  class="alert alert-success alert-dismissible mt-3 position-absolute bottom-0 end-0" role="alert"
        style="max-width:20 rem;">
        <div class="alert-text">
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif
  @if (session ("auth"))
  <div id="message"  class="alert alert-success alert-dismissible mt-3 position-absolute bottom-0 end-0" role="alert"
        style="max-width:20 rem;">
        <div class="alert-text">
               {{session("auth")}}
            </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if (session ("update"))

  <div id="message"  class="alert alert-success alert-dismissible mt-3 position-absolute bottom-0 end-0" role="alert"
        style="max-width:20 rem;">
        <div class="alert-text">
            {{session("update")}}
            </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif


<section>

    <div class="container d-flex flex-column gap-5">
        <div class="d-flex gap-3 user_name align-items-center">
            <img alt="иконка пользователя" src="/img/user_cub.svg">
            <h2 class="">Привет, Пользователь</h2>
        </div>
        <div class="d-flex justify-content-between  nav_personal">
            <a style="color: aliceblue;" id="get" href="/courier/personal_Area">Личная информация</a>
            <a style="color: aliceblue;" id="get" href="/courier/orders_for_courier">Доступные заказы</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Номер заказа</th>
                    <th scope="col">Имя клиента</th>
                    <th scope="col">Адрес доставки</th>
                    <th scope="col">Заведение</th>
                    <th scope="col">Способ оплаты</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Иван Иванов</td>
                    <td>ул. Пушкина, д. 12, кв. 34</td>
                    <td>Кафе "Уголок вкуса"</td>
                    <td>Наличными при получении</td>
                    <td><a href="" class="courier_button    ">Принять</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Петр Петров</td>
                    <td>ул. Лермонтова, д. 25, кв. 67</td>
                    <td>Ресторан "Гурман"</td>
                    <td>Онлайн-оплата картой</td>
                    <td><a href="">Принять</a></td>
                </tr>
                <!-- Добавьте более строк, если требуется -->
            </tbody>
        </table>
    </div>

    

<x-footer />

<script>
function readURL(input) { //
    if (input.files && input.files[0]) {
     var reader = new FileReader(); //позволяет читать асинхронно содержимое файлов, хранящийся на пк

     reader.onloadend = function(e) { //Срабатывает только после того как скрипт был загружен  и выполнен
      $('#prevImage').attr('src', e.target.result); // attr - Название атрибута, которое нужно получить.
     }

     reader.readAsDataURL(input.files[0]); //используется для чтения содержимого files
    }
   }
   $("#imageFile").change(function() { //change - Событие  происходит по окончании изменения значения элемента формы, когда это изменение зафиксировано.
    readURL(this);
   });

   setTimeout(function(){
    // div.classList.remove("d-flex");
       document.getElementById('message').style.display = 'none';
    //   ('message').classList.remove("d-flex");
   }, 10000);
</script>
