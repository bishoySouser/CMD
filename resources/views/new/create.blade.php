@extends('layouts.master')
@section('content')

  <h4>Create one New:</h4>
  @include('partials.error')
    <form action="{{ route('new.create') }}" method="post" enctype="multipart/form-data">
      <div class="row">

          <div class="form-group col-md-4">
            <label for="news title">news title</label>
            <input type="text" name="title" class="form-control" id="news title" placeholder="news title">
          </div>


          <div class="form-group col-md-4">
            <label for="exampleFormControlFile1">upload main photo</label>
            <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
          </div>

          <div class="form-group col-md-4">
            <label for="inputState">Category</label>
            <select name="category_id"  id="inputState" class="form-control">
              <option>Choose...</option>
              @foreach ($categories as $category);
                <option value="{{$category->id}}" >{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

      </div>

      <textarea name="content"></textarea>
      {{ csrf_field() }}

      <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
