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
            <a class="nav-link" href="{{ route('admin.searchNew') }}?search={{$search}}">New({{ count($news) }})</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.search') }}?search={{$search}}">Categroy({{ count($categories) }})</a>
          </li>
        </ul>
      </div>
        <hr>
        <thead>Categroy :<thead>
        <tbody>
          @if (count($categories) > 0 )
            @foreach($categories as $categroy)
              <tr>
                <td>{{$categroy->name}}</td>
                <td>
                  <a href="{{ route('category.edit', ['id' => $categroy->id]) }}">Edit</a>
                  <a href="{{ route('category.delete', ['id' => $categroy->id]) }}">Delete</a>
                  <a href="{{ route('category.category', ['id' => $categroy->id]) }}">show</a>
                  <td>
                  </tr>
                @endforeach
            @else

                  <td><strong>Not Found</strong><td>


            @endif
        </tbody>
    </table>
@endsection
