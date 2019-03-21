@extends('layouts.master')
@section('content')
  <h4>Edit New:</h4>
  @include('partials.error')
    <form action="{{ route('new.update') }}" method="post" enctype="multipart/form-data">
      <div class="row">

          <div class="form-group col-md-4">
            <label for="news title">news title</label>
            <input type="text" name="title" value="{{$new->title}}" class="form-control" id="news title" placeholder="news title">
          </div>


          <div class="form-group col-md-4">
            <label for="exampleFormControlFile1">upload main photo</label>
            <input type="file" name="photo"  class="form-control-file" id="photo" >
            <input type="hidden" name="photo_1" value="{{ $new->photo }}"  class="form-control-file" id="photo" >


          </div>

          <div class="form-group col-md-4">
            <label for="inputState">Category</label>
            <select name="category_id"  id="inputState" class="form-control">
              <option>Choose...</option>
              @foreach ($categories as $category);
                <option value="{{$category->id}}" {{ $category['id'] == $category['id'] ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

      </div>

      <textarea name="content">{{$new->content}}</textarea>
      <input type="hidden" name="id" value="{{ $newId }}">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
