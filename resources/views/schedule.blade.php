@extends('layouts.panel')
@section('content')
<form action="{{url('/schedule')}}" method="post">
  @csrf
  <div class="card shadow">
    <div class="card-header border-0">
      <h3 class="mb-0">Gestionar Horarios</h3>
      <div class="col text-right">
        <button type="submit" href="{{ url('doctors/create')}}" class="btn btn-sm btn-success">Gestionar cambios</button>
      </div>
    </div>
    <div class="card-body">
      @if (session('notification'))
        <div class="alert alert-success" role="alert">
          {{session('notification')}}
        </div>  
      @endif
      @if (session('errors'))
      <div class="alert alert-danger" role="alert">
        Los Cambios se han guardado pero tener en cuenta que:
        <ul>
          @foreach (session('errors') as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>  
    @endif
    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Dia</th>
            <th scope="col">Activo</th>
            <th scope="col">Turno Mañana</th>
            <th scope="col">Turno Tarde</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($workdays as $key => $workday)
            <tr>
                <th>{{$days[$key]}}</th>
                <td>
                  <label class="custom-toggle">
                    <input type="checkbox" name="active[]" value="{{$key}}" 
                    @if($workday->active) checked @endif>
                    <span class="custom-toggle-slider rounded-circle"></span>
                  </label>
                </td>
                <td>
                    <div class="row">
                      <div class="col">
                        <select name="morning_start[]" id="morning_start" class="form-control">
                          @for ($i = 5; $i <= 11; $i++)
                            <option value="{{($i<10 ? '0' : '').$i}}:00" @if($i.':00 AM' == $workday->morning_start) selected @endif>{{$i}}:00 AM</option>
                            <option value="{{($i<10 ? '0' : '').$i}}:30" @if($i.':30 AM' == $workday->morning_start) selected @endif>{{$i}}:30 AM </option>
                          @endfor
                        </select>
                      </div>
                        <div class="col">
                          <select name="morning_end[]" id="morning_end" class="form-control">
                            @for ($i = 5; $i <= 11; $i++)
                              <option value="{{($i<10 ? '0' : '').$i}}:00" @if($i.':00 AM' == $workday->morning_end) selected @endif>{{$i}}:00 AM</option>
                              <option value="{{($i<10 ? '0' : '').$i}}:30" @if($i.':30 AM' == $workday->morning_end) selected @endif>{{$i}}:30 AM</option>
                            @endfor
                          </select>
                        </div>
                    </div>
                </td>
                <td>            
                    <div class="row">
                        <div class="col">
                            <select name="afternoon_start[]" id="afternoon_start" class="form-control">
                              @for ($i = 1; $i <= 11; $i++)
                                <option value="{{$i + 12}}:00" @if($i.':00 PM' == $workday->afternoon_start) selected @endif>{{$i+12}}:00 PM </option>
                                <option value="{{$i + 12}}:30" @if($i.':30 PM' == $workday->afternoon_start) selected @endif>{{$i+12}}:30 PM </option>
                              @endfor
                            </select>
                        </div>
                        <div class="col">
                            <select name="afternoon_end[]" id="afternoon_end" class="form-control">
                              @for ($i = 1; $i <= 11; $i++)
                                <option value="{{$i + 12}}:00" @if($i.':00 PM' == $workday->afternoon_end) selected @endif>{{$i+12}}:00 PM</option>
                                <option value="{{$i + 12}}:30" @if($i.':30 PM' == $workday->afternoon_end) selected @endif>{{$i+12}}:30 PM</option>
                              @endfor
                            </select>
                        </div>
                    </div>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="card-body">
  
      </div>
    </div>
  </div>
</form>
@endsection