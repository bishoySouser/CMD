@extends('layouts.master')
@section('content')
  <h4>News</h4>
  <hr>
  @if (Session::has('info'))
    <div class="col-md-12">
      <div class="alert alert-info" role="alert">
        {{ Session::get('info') }}
      </div>
    </div>
  @endif
  <div class="row">
    <div class="col-md-12">

      @foreach ($news as $new)
        <p><strong>{{ $new->title }}</strong>
          <a href="{{ route('new.edit', ['id' => $new->id]) }}">Edit</a>
          <a href="{{ route('new.delete', ['id' => $new->id]) }}">Delete</a>
          <a href="{{ route('new.new', ['id' => $new->id]) }}">show</a>
      @endforeach
    </div>
@endsection
