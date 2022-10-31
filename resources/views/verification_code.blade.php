@extends('layout')
@section('content')

<div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Reset Password</div>
                
               <div class="card-body">
                    @if (session('status'))
                         <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                   <form method="POST" action="{{ route('email.post') }}">
                        @csrf
                          <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Verification Code</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="user_verified_code" value="{{ old('user_email') }}" autocomplete="email" autofocus>

                              
                            </div>
                        </div>

                   <div class="form-group row mb-0">
                         <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send verification Code
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection