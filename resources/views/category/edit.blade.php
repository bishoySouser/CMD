@extends('layouts.master')
@section('content')
  <h4>Edit category:</h4>
  <hr>

  <form action="{{ route('category.update') }}" method="post">
  <div class="form-group">
    <label for="name">Category Name:</label>
    <input type="text" name="name" value="{{ $category['name'] }}" class="form-control form-control-sm col-md-2" id="name" placeholder="Category name">
  </div>
  <input type="hidden" name="id" value="{{ $categoryId }}">
  {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
