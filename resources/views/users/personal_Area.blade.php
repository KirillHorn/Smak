<x-x-header />
@if (session ("success"))
<div>
    <div  id="message"  class="message">

<span class="fw-bold">{{session("success")}}</span>

    </div>
</div>
  @endif

  @if (session ("update"))
 <div>
    <div  id="message"  class="message">

<span class="fw-bold">{{session("update")}}</span>

    </div>
</div>
  @endif

<section>

    <div class="container d-flex flex-column gap-5">
        <div class="d-flex gap-3 user_name align-items-center">
            <img alt="иконка пользователя" src="/img/user_cub.svg">
            <h2 class="">Привет, Пользователь</h2>
        </div>
        <div class="d-flex justify-content-between  nav_personal">
            <a style="color: aliceblue;" id="get">Личная информация</a>

            <a style="color: aliceblue;">Ваши заказы</a>
        </div>
        <div class="d-flex flex-column ">
            <div class="d-flex gap-5 information_personal_text">
                <div class="d-flex flex-column fw-bold">
                    <span>Имя</span>
                    <span>Фамилия</span>
                    <span>Отчество</span>
                    <span>Номер телефона</span>
                    <span>Электронная почта</span>
                </div>
                <div class="d-flex flex-column">
                    <span>{{Auth::user()->name}}</span>
                    <span>{{Auth::user()->surname}}</span>
                    <span>{{Auth::user()->patronymic}}</span>
                    <span>{{Auth::user()->phone}}</span>
                    <span>{{Auth::user()->email}}</span>
                </div>
            </div>
            <button type="button" class="button_change" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Изменить</button>
        </div>



        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" style="color: #A408A7;" id="exampleModalLabel">Редактировать данные</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="{{ route('r.update', ['id' => Auth::user()->id]) }}" class=" forma_register d-flex justify-content-center flex-column align-items-center">
                    @csrf
                     @method('PATCH')
                    <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label text_label">Имя</label>
                                <input type="text" name="name" value="{{Auth::user()->name}}" placeholder=" @error('name') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Фамилия</label>
                                <input type="text" name="surname" value="{{Auth::user()->surname}}" placeholder=" @error('surname') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Отчество</label>
                                <input type="text" name="patronymic" value="{{Auth::user()->patronymic}}" placeholder=" @error('patronymic') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                                <input type="email" name="email" value="{{Auth::user()->email}}" placeholder="  @error('email') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Номер телефона</label>
                                <input type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="  @error('phone') {{$message}}  @enderror" class="form-control" id="tel" aria-describedby="emailHelp" placeholder="+ _ (_ _ _) _ _ _ - _ _ - _ _">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                                <input type="password" name="password" value="" placeholder="  @error('password') {{$message}}  @enderror" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" name="confirm_password" class="form-label">Повторите пароль</label>
                                <input type="password" name="confirm_password" value="{{old('confirm_password')}}" placeholder="  @error('password') {{$message}}  @enderror" class="form-control" id="exampleInputPassword1">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <input type="submit" value="Изменить данные" class="btn btn-primary ">
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="d-flex flex-column user_orders">
            <h2 style="text-align: center; color:aliceblue">Ваши заказы</h2>
            @foreach ($orders as $order)
            <div class="d-flex user_orders_information align-items-center ">

                <span>{{$order->id}}</span>
                <span>@foreach ($basket as $baskets)
                {{$baskets->id_product}}
                @endforeach
                </span>
                <span>{{$order->comment}}</span>
                <span>{{$order->location}}</span>
                <span>{{$order->amount}}</span>

            </div>
            @endforeach
            
        </div>
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
