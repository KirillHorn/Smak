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

  <section class="mb-5">
    <div class="container d-flex flex-column gap-4  ">
        <div class="d-flex gap-3 user_name align-items-center">
            <img alt="иконка пользователя" src="/img/user_cub.svg">
            <h2 class="">Доступные заказы</h2>
        </div>
        <div class="d-flex justify-content-between nav_personal">
            <a style="color: aliceblue;" id="get" href="/courier/personal_Area">Личная информация</a>
            <a style="color: aliceblue;" id="get" href="/courier/orders_for_courier">Доступные заказы</a>
        </div>
        <div class="d-flex flex-column gap-4">
                                    <div class="d-flex flex-wrap gap-4 justify-content-between  a_content_categories courier_order_area">
                                        <a href="/courier/0/orders_for_courier" >Все районы</a>
                                            @foreach ($area as $areas)
                                        <a  href= "/courier/{{$areas->id}}/orders_for_courier" >{{$areas->title_area}}</a>
                                        @endforeach
                                     </div>
                             </div>
        <table class="table table_courier mb-0">
            <thead>
                <tr>
                    <th scope="col">Номер заказа</th>
                    <th scope="col">Имя клиента</th>
                    <th scope="col">Филиал</th>
                    <th scope="col">Улица филиала</th>
                    <th scope="col">Район филиала</th>
                    <th scope="col">Улица заказа</th>
                    <th scope="col">Способ оплаты</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order_user)
                <tr>
                    <td>{{ $order_user->id }}</td>
                    <td>{{ $order_user->user->name }}</td>
                    <td>№{{ $order_user->branch_title }}</td>
                    <td>{{ $order_user->branch_street }}</td>
                    <td>{{ $order_user->branch_area }}</td>
                    <td>{{ $order_user->order_street }}</td>
                    <td>{{ $order_user->paymant }}</td>
                    <td><a href="{{ route('courier.order', ['id' => $order_user->id]) }}" class="courier_button">Принять</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">Нет доступных заказов</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $orders->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</section>
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
