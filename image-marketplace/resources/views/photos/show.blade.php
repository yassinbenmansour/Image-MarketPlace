@extends('layouts.app')

@section('title')
    Image Details 
@endsection

@section('content')
    <!-- Gallery -->

    <div class="row my-4">
      <div class="col-lg-6 col-md-8 mb-4  " 
      data-mdb-ripple-init
      data-mdb-ripple-color="light"
      >
        <img
          src={{asset($photo->url)}}
          alt="{{$photo->body}}"
          class="w-100  rounded mb-4 "
          height = "500"
        />
      </div>
      <div class="col-lg-6 col-md-4  ">
        <div class="d-flex flex-column justify-content-start" >
            <div class="d-flex  justify-content-start align-items-center" >
                <img
                src={{asset($photo->user->profile_image)}}
                alt="profile"
                class="img-fluid rounded me-3 "
                width="40"
                height = "40"
              />
              <div class="d-flex justify-content-start">
                <span class="fw-bold">
                    {{$photo->user->name}}
                </span>

              </div>
            </div>
            <div>
                @if (!$photo->is_free)
                <div class="text-danger pt-3 fw-bold">
                    <span class="me-3 fw-bold text-dark">Price : </span><span>${{$photo->price}}</span>
                </div>
            @endif
            </div>
            <p class="mt-3">
                <i class="text-muted">{{$photo->body}}</i>
            </p>
            <div class="mt-3">
                @if ($photo->is_free)
                    <a class="text-white btn btn-primary" href="{{asset($photo->url)}}" Download>
                        Download
                    </a>
                @else 
                    @guest
                        <a href="{{route('login')}}" class="text-white btn btn-primary">
                            Buy Image
                        </a>    
                    @endguest
                    @auth
                        <a href="{{route('stripe.form',$photo->id)}}" class="text-white btn btn-primary">
                            Buy Image
                        </a>   
                    @endauth
                @endif
            </div>
        </div>
    </div>

  </div>
  <!-- Gallery -->
@endsection