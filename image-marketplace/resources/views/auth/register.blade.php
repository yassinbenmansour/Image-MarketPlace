@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    @include('layouts.alerts')
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="name" name="name" class="form-control" />
                            <label class="form-label" for="name">First Name</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" name="email" id="email" class="form-control" />
                            <label class="form-label" for="email">Email address</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control" />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" />
                            <label class="form-label" for="password_confirmation">Password Confirmation</label>
                        </div>

                        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
