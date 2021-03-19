@extends('layouts.panel')
@section('content')
<div class="row">
  <div class="col-md-12 mb-4"> 
    <div class="card">
      <div class="card-header">Panel</div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          Hola {{auth()->user()->name}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

