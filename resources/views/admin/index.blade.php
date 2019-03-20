@extends('layouts.master')
@section('content')
  <div class="row">
    <div class="col-xl-12 col-sm-12 mb-4">
      <h2 class="text-center">Welcome to Admin Con</h2>
    </div>

  </div>
<div class="row">

  <div class="col-xl-6 col-sm-6 mb-4">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-comments"></i>
        </div>
        <div class="mr-5">{{ count($news) }} News!</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{ route('new.index') }}">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>

  <div class="col-xl-6 col-sm-6 mb-4">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-list"></i>
        </div>
        <div class="mr-5">{{ count($categories) }} Categories!</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{ route('category.index') }}">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>

</div>
@endsection
