@extends('auth.layouts.master')

@section('title')
Register
@endsection

@section('content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
        <div class="card mb-3">
          <div class="card-body">
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
              <p class="text-center small">Enter your details to create account</p>
            </div>

            <form class="row g-3 needs-validation" action="{{ route('register.store') }}" method="POST">
              @csrf
                
              <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
                @error('name')
                  <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                  <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                @error('email')
                  <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
                @error('password')
                  <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                @error('password_confirmation')
                  <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Create Account</button>
              </div>

              <div class="col-12">
                <p class="small mb-0">Already have an account? <a href="{{ route('login.view') }}">Login</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection