@extends('layouts/login-template')

@section('form-login')
<div class="container py-5 h-100">
  <div class="row d-flex align-items-center justify-content-center h-100">
    <div class="col-md-8 col-lg-7 col-xl-6">
      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image" />
    </div>
    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
      <div class="mb-5">
        <i class="fa-solid fa-wheat-awn fa-2x" style="color: #2d31fa"></i>
        <span class="h1 fw-bold mb-0">Hiber.App</span>
      </div>
      <form action="#" class="need-validated">
        <h3 class="fw-bold mb-3 pb-3" style="letter-spacing: 1px">Log in</h3>
        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label fw-bold" for="email">Email address</label>
          <input type="email" id="email" class="form-control form-control-lg fs-6" placeholder="Masukkan Email..." required />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="form-label fw-bold" for="password">Password</label>
          <div class="input-group">
            <input type="password" id="password" class="form-control form-control-lg fs-6" placeholder="Masukkan Password..." required />
            <span class="input-group-text">
              <i class="fa-solid fa-eye" id="toggle-password" style="cursor: pointer" toggle="#password"></i>
            </span>
          </div>
        </div>
        <!-- Submit button -->
        <div class="d-grid gap-2 pt-4">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Log In</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
