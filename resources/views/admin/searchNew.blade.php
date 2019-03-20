@extends('layouts.master')
@section('content')
  <h4>Some results for search:</h4>
  <hr>
        {{-- <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2> --}}
    <table class="table table-striped">
      <div class="col-md-4">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.searchNew') }}?search={{$search}}">New({{ count($news) }})</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.search') }}?search={{$search}}">Categroy({{ count($categories) }})</a>
          </li>
        </ul>
      </div>
        <hr>
        <thead>New :<thead>
        <tbody>
          @if (count($news) > 0 )
            @foreach($news as $new)
              <tr>
                <td>{{$new->title}}</td>
                <td>
                  <a href="#">Edit</a>
                  <a href="#">Delete</a>
                  <a href="#">show</a>
                  <td>
                  </tr>
                @endforeach
            @else
                  <td><strong>Not Found</strong><td>
            @endif
        </tbody>
    </table>
@endsection
