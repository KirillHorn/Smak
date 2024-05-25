@include('admin.inc.sidebar')
<x-alerts/>
<div class="wrapper">
<div class="container">
  <h2 class="text-center">Филиал: удаление|редактирование</h2>
  <div class="d-flex justify-content-center gap-1 filtr">
  <form method="GET" action="{{ route('serviceEdit_blade') }}" class="form-inline">
        <div class="form-group mr-2 ">
            <label for="area" class="mr-2">Выберите район:</label>
            <div class="d-flex ">
            <select name="area_id" id="area" class="form-control">
                <option value="">Все районы</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ request('area_id') == $area->id ? 'selected' : '' }}>
                        {{ $area->title_area }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn button_redact_filt text-light" >Фильтровать</button>
            </div>
        </div>
   
    </form>
       
    </div>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">Фото</th>
      <th scope="col">Улица</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($branch as $branchs)
    <tr>
      <td class="align-middle fw-bold">{{$branchs->id}}</td>
      <td class="align-middle fw-bolder">{{$branchs->title}}</td>
      <td class="align-middle"><img src="/storage/img/{{$branchs->img}}" alt="" class="img_align"></td>
      <td class="align-middle">{{$branchs->street->title_street }}</td>
      <td class="align-middle"><a href="/admin/{{$branchs->id}}/EditCafes"><button type="submit" class="btn btn-primary button_redact">Редактировать</button></a></td>
      <td class="align-middle">
      <form action="{{route ('delete.cafes' , ['id' => $branchs->id ])}}" method="POST">
                        @csrf
                         @method('DELETE')            
      <button type="submit" class="btn btn-danger" style="margin-top: 16px">Удалить</button>
      </form>
    </td>
    </tr>
    @endforeach
   
  </tbody>
  </table>
  {{ $branch->withQueryString()->links('pagination::bootstrap-5') }}
  <hr>
</div>
</div>
<script>

setTimeout(function(){
    document.getElementById('message').style.display = 'none';
  }, 5000);

  </script>
