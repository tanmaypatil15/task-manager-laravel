@extends('auth.layouts.master')

@section('title')
    Login
@endsection

@section('content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                  <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                            <p class="text-center small">Enter your email address & password to login</p>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form class="row g-3 needs-validation" action="{{ route('login.check') }}" method="POST">
                          @csrf
                          <div class="col-12">
                              <label for="email"  class="form-label">Email</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'input-error' : '' }}">
                              </div>
                              @error('email')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="col-12">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'input-error' : '' }}">
                              @error('password')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="col-12">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember">
                                  <label class="form-check-label" for="remember">Remember me</label>
                              </div>
                          </div>

                          <div class="col-12">
                              <button class="btn btn-primary w-100" type="submit">Login</button>
                          </div>
                          <div class="col-12">
                              <p class="small mb-0">Don't have account? <a href="{{ route("register.view") }}">Create an account</a></p>
                          </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
@endsection
