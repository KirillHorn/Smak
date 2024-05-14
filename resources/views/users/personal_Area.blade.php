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

    <div class="container d-flex flex-column gap-3">
        <div class="d-flex gap-3 user_name align-items-center">
            <img alt="иконка пользователя" src="/img/user_cub.svg">
            <h2 class="">Привет {{Auth::user()->name}}</h2>
        </div>
        <div class="d-flex justify-content-between  nav_personal">
            <a style="color: aliceblue;" id="get">Личная информация</a>
        </div>
        <div class="d-flex flex-column ">
            <div class="d-flex gap-4 information_personal_text">
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
            <button type="button" class="button_update" data-bs-toggle="modal" data-bs-target="#signUp" data-bs-whatever="@mdo">Изменить</button>
           
            </div>



            <div class="modal fade" id="signUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <span> @error('name') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Фамилия</label>
                                <input type="text" name="surname" value="{{Auth::user()->surname}}" placeholder=" @error('surname') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span> @error('surname') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Отчество</label>
                                <input type="text" name="patronymic" value="{{Auth::user()->patronymic}}" placeholder=" @error('patronymic') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span> @error('patronymic') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                                <input type="email" name="email" value="{{Auth::user()->email}}" placeholder="  @error('email') {{$message}}  @enderror" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span> @error('email') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Номер телефона</label>
                                <input type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="  @error('phone') {{$message}}  @enderror" class="form-control" id="tel" aria-describedby="emailHelp" placeholder="+ _ (_ _ _) _ _ _ - _ _ - _ _">
                                <span> @error('phone') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Старый пароль</label>
                                <input type="password" name="password_old" value="" placeholder="  " class="form-control" id="exampleInputPassword1">
                                @error('password_old') 
                                <p>
                                {{$message}} 
                                </p>
                                 @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" name="confirm_password" class="form-label">Новый пароль</label>
                                <input type="password" name="password" value="{{old('password')}}" placeholder="" class="form-control" id="exampleInputPassword1">
                                @error('password') 
                                {{$message}} 
                                 @enderror
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <input type="submit" value="Изменить данные" class="btn button_update_modal">
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column user_orders">
            <h2 style="text-align: center; color:aliceblue">Ваши заказы</h2>
           
           
            <table class="table table-borderless table_product table_">
  <thead style="border-bottom: 1px solid #A408A7;">
    <tr class="table_product_tr">
      <th scope="col">Номер</th>
      <th scope="col">Цена</th>
      <th scope="col">Адрес</th>
      <th scope="col">Комментарий</th>
      <th scope="col">Дата</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $orderss)
    <tr class="table_product_tr">
      <th scope="row">{{$orderss->id}}</th>
      <td>{{$orderss->amount}}₽</td>
      <td>{{$orderss->location}}</td>
      <td>{{$orderss->comment}}</td>
      <td>{{$orderss->created_at}}</td>
      <td><a href="order_user/{{$orderss->id}}">Подробнее</a></td>
    </tr>
    @endforeach
</table>
         
            
        </div>
    </div>
</section>

<x-footer />
@if (session('error_signUp'))
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const modal = new bootstrap.Modal(document.getElementById('signUp'));
            modal.show();
        });
    </script>
@endif

@if ($errors->has('login')||$errors->has('email')||$errors->has('phone')||$errors->has('password')||$errors->has('password_old'))
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const modal = new bootstrap.Modal(document.getElementById('signUp'));
            modal.show();
        });
    </script>
@endifcript>
@endif



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
