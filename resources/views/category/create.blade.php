@extends('layouts.master')
@section('content')
  <h4>Create New Category:</h4>
  <hr>
  @include('partials.error')

  <form action="{{ route('category.create') }}" method="post">
  <div class="form-group">
    <label for="name">Category Name:</label>
    <input type="text" name="name" class="form-control form-control-sm col-md-2" id="name" placeholder="Category name">
  </div>
  {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection
