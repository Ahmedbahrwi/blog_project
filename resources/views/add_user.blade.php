@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Add User</div>
                  <div class="card-body">
  
                      <form action="{{ route('user.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="user_name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="user_name" class="form-control" name="user_name" required autofocus>
                                  @if ($errors->has('user_name'))
                                      <span class="text-danger">{{ $errors->first('user_name') }}</span>
                                  @endif
                              </div>
                          </div>
                          
  
  
                          <div class="form-group row">
                              <label for="user_email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="user_email" class="form-control" name="user_email" required autofocus>
                                  @if ($errors->has('user_email'))
                                      <span class="text-danger">{{ $errors->first('user_email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="user_password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="user_password" class="form-control" name="user_password" required>
                                  @if ($errors->has('user_password'))
                                      <span class="text-danger">{{ $errors->first('user_password') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="user_mobile" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                              <div class="col-md-6">
                                  <input type="text" id="user_mobile" class="form-control" name="user_mobile" required autofocus>
                                  @if ($errors->has('user_mobile'))
                                      <span class="text-danger">{{ $errors->first('user_mobile') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection