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
          <a href="{{ route('new.delete', ['id' => $new->id]) }}" class="confirmation">Delete</a>
          <a href="{{ route('new.new', ['id' => $new->id]) }}">show</a>
      @endforeach
      <script type="text/javascript">
          var elems = document.getElementsByClassName('confirmation');
          var confirmIt = function (e) {
              if (!confirm('Are you sure?')) e.preventDefault();
          };
          for (var i = 0, l = elems.length; i < l; i++) {
              elems[i].addEventListener('click', confirmIt, false);
          }
      </script>
    </div>
@endsection
