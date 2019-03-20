@extends('layouts.master')
@section('content')
  <h4>Show News:</h4>
  <hr>
  <div class="row">

      <div class="col-md-4">
        <label for="news title">news title</label>
        <p>{{$new->title}}</p>
      </div>


      <div class="col-md-4">
        <label for="exampleFormControlFile1">upload main photo</label>
        <img src="{{asset("storege/$new->photo")}}" alt="">
      </div>

      <div class="col-md-4">
        <label for="inputState">Category:</label>
        <p></p>
      </div>

  </div>
  <div class="col-md-12">
    <label for="inputState">New Content:</label>
    <p>{!! $new->content !!}<p>
  </div>
@endsection
