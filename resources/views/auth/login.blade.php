@extends('layouts.form')
@section('title', 'Inicio de Sesion')
@section('subtitle', 'Ingresa los datos para iniciar sesion')
@section('content')
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <strong>ATENCION </strong>{{$errors->first()}}
                            </div>
                        @endif
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                value="{{ old('email') }}" placeholder="Email" type="email" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" type="password" required>
                            </div>
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input name="remember" class="custom-control-input" id="remember" type="checkbox" 
                            {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">
                                <span class="text-muted">Recordar sesion</span>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <!-- <div class="col-6">
                    <a href="{{ route('password.request') }}" class="text-light"><small>Forgot password?</small></a>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('register') }}" class="text-light"><small>Create new account</small></a>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
