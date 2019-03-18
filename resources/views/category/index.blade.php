@extends('layouts.master')
@section('content')
  <h4>Categories:</h4>
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
      @foreach ($categories as $categroy)
        <p><strong>{{ $categroy->name }}</strong>
          <a href="{{ route('category.edit', ['id' => $categroy->id]) }}">Edit</a>
          <a href="{{ route('category.delete', ['id' => $categroy->id]) }}">Delete</a>
          <a href="{{ route('category.category', ['id' => $categroy->id]) }}">show</a>
      @endforeach
    </div>

  </div>
@endsection
