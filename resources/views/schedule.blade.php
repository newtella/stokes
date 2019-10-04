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
          @foreach ($days as $key => $day)
            <tr>
                <th>{{$day}}</th>
                <td>
                  <label class="custom-toggle">
                    <input type="checkbox" name="active[]" value="{{$key}}" >
                    <span class="custom-toggle-slider rounded-circle"></span>
                  </label>
                </td>
                <td>
                    <div class="row">
                        <div class="col">
                          <select name="morning_start[]" id="morning_start" class="form-control">
                            @foreach ($morningtimes as $morningtime)
                                <option value="{{$morningtime}}">{{$morningtime}} Hrs</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col">
                          <select name="morning_end[]" id="morning_end" class="form-control">
                            @foreach ($morningtimes as $morningtime)
                              <option value="{{$morningtime}}">{{$morningtime}} Hrs</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                </td>
                <td>            
                    <div class="row">
                        <div class="col">
                            <select name="afternoon_start[]" id="afternoon_start" class="form-control">
                                @foreach ($afternoontimes as $afternoontime)
                                    <option value="{{$afternoontime}}">{{$afternoontime}} Hrs</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="afternoon_end[]" id="afternoon_end" class="form-control">
                                @foreach ($afternoontimes as $afternoontime)
                                    <option value="{{$afternoontime}}">{{$afternoontime}} Hrs</option>
                                @endforeach
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