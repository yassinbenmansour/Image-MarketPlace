@extends('layouts.app')


@section('title')
    Login
@endsection

@section('content')
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>                        
                    <div class="card-body">
                            <form method="POST" action="{{route('login')}}">
                                @csrf
                        
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                  <input type="email" name="email" id="form1Example1" class="form-control" autocomplete="off" />
                                  <label class="form-label" for="form1Example1">Email address</label>
                                </div>
                              
                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                  <input type="password" id="form1Example2" name="password" class="form-control" />
                                  <label class="form-label" for="form1Example2">Password</label>
                                </div>


                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                        {{old('remember') ? 'checked' : ''}} />
                                        <label class="form-check-label" for="form1Example3"> Remember me </label>
                                      </div>
                                    </div>
                                </div>
                              
                                <!-- Submit button -->
                                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Login</button>
                              </form>
                        </div>
                 </div>
            </div>
        </div>
@endsection