@extends('layouts.form')
@section('title', 'Registro')
@section('subtitle', 'Rellena los campos para darte de alta')
@section('content')
<div class="container mt--8 pb-5">
    <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body bg-transparent pb-5">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                @if($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <strong>ATENCION </strong>{{$errors->first()}}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                        </div>
                                        <input id="name" placeholder="Nombre" type="text" class="form-control" 
                                        name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input id="email" type="email"  placeholder="Correo Electronico" class="form-control" 
                                        name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input id="password" type="password" placeholder="Contraseña" class="form-control" 
                                        name="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input id="password-confirm"  placeholder="Confirmar Contraseña" type="password" 
                                        class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">Create account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- End of Table -->
</div>
@endsection
