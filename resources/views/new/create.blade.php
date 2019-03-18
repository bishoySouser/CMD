@extends('layouts.master')
@section('content')
  <h4>Create one New:</h4>
    <form>
      <div class="row">

          <div class="form-group col-md-4">
            <label for="news title">news title</label>
            <input type="text" class="form-control" id="news title" placeholder="news title">
          </div>


          <div class="form-group col-md-4">
            <label for="exampleFormControlFile1">upload main photo</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>

          <div class="form-group col-md-4">
            <label for="inputState">Category</label>
            <select id="inputState" class="form-control">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>

      </div>

      <textarea>Next, get a free TinyMCE Cloud API key!</textarea>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
