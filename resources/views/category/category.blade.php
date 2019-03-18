@extends('layouts.master')
@section('content')
  <h4>Show Category:</h4>
  <hr>

  <div class="row">
    <div class="col-md-12">
      <p><strong>Category name: </strong><span>{{$category->name}}</span></p>
    </div>
  </div>
@endsection
