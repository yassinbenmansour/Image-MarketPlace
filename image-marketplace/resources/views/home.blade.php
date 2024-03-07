@extends('layouts.app')


@section('title')
    Home
@endsection


@section('content')
    <!-- Gallery -->
<div class="row my-4">
    @foreach ($photos as $photo)
      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <img
          src={{asset($photo->url)}}
          class="w-100  shadow-1-strong rounded mb-4"
          height = "350"
          alt="Boat on Calm Water"
        />
      </div>
    @endforeach
  </div>
  <!-- Gallery -->
@endsection