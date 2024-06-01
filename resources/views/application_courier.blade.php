<x-x-header />
<x-alerts />


<section>
  <div class="container d-flex flex-column gap-3">
    @if (session("error"))
    {{session("error")}}
    @endif
    <h2 class="h2_auth fw-bold">Стать курьером</h2>
    <form method="POST" action="/registration_courier" class="forma_auth d-flex justify-content-center flex-column" style="margin-bottom: 40px;">
      @csrf
      <div class="mb-3">
        <label for="surname" class="form-label">Фамилия</label>
        <input type="text" name="surname" value="{{ old('surname') }}" class="form-control @error('surname') is-invalid @enderror" id="surname" aria-describedby="surnameHelp">
        @error('surname')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="name" class="form-label text_label">Имя</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="patronymic" class="form-label">Отчество</label>
        <input type="text" name="patronymic" value="{{ old('patronymic') }}" class="form-control @error('patronymic') is-invalid @enderror" id="patronymic" aria-describedby="patronymicHelp">
        @error('patronymic')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Электронная почта</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Номер телефона</label>
        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="phone" aria-describedby="phoneHelp">
        @error('phone')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <input type="submit" value="Подать заявку" class="btn btn-primary input_auth input_application">
    </form>
  </div>
</section>

<x-footer />