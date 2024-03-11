@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <!-- Gallery -->

<div class="row my-4">
    @foreach ($photos as $photo)
      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0   bg-image hover-overlay " 
      data-mdb-ripple-init
      data-mdb-ripple-color="light"
      >
        <img
          src={{asset($photo->url)}}
          alt="{{$photo->body}}"
          class="w-100  shadow-1-strong rounded mb-4 "
      
          height = "350"
        />
        <a href="{{route('photos.show',$photo->id)}}">
          <div class="mask" style="background-color: hsla(0, 0%, 98%, 0.2)"></div>
        </a>
      </div>
    @endforeach
  </div>
  <!-- Gallery -->
@endsection