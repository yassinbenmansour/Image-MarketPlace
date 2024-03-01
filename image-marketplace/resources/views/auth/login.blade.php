@extends('layouts.app')


@section('title')
    Login
@endsection

@section('content')
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <form method="POST" action="{{route('login')}}">
                                @csrf
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form1Example1" name="name" autocomplete="off" class="form-control" />
                                    <label class="form-label" for="form1Example1">First Name</label>
                                </div>

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
                              
                                <!-- Submit button -->
                                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Login</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection