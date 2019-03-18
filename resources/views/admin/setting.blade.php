@extends('layouts.master')
@section('content')
  @include('partials.error')
  @if (Session::has('info'))
    <div class="col-md-12">
      <div class="alert alert-info" role="alert">
        {{ Session::get('info') }}
      </div>
    </div>
  @endif

  <form action="{{ route('admin.setting') }}" method="post">
      {{-- site name --}}
      <div class="row">

        <div class="input-group col-xl-4 col-sm-4 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text">Site name</span>
          </div>
          <input type="text" name="site_name" value="{{ $user['site_name'] }}" class="form-control" placeholder="site name">
        </div>

        <div class="input-group col-xl-4 col-sm-4 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text">Site Email address</span>
          </div>
          <input type="text" name="email" value="{{ $user['email'] }}" class="form-control" placeholder="site Email address">
        </div>

      </div>

      <div class="form-group">
        <label for="Site Keywords">Site Keywords</label>
        <textarea class="form-control col-xl-8 col-sm-8" name="keyword" id="Site Keywords" rows="5">{{ $user['keyword'] }}</textarea>
      </div>

      <div class="form-group">
        <label for="Site Keywords">Site description</label>
        <textarea class="form-control col-xl-8 col-sm-8" name="desc" id="Site Keywords" rows="5">{{ $user['desc'] }}</textarea>
      </div>

      <div class="row">

        <div class="input-group col-xl-4 col-sm-4 mb-4">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Maintenance</label>
          <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="status">
            <option value="">Maintenance</option>
            <option value="Enable" {{ $user['status'] == 'Enable' ? 'selected' : '' }}>Enable</option>
            <option value="Disable" {{ $user['status'] == 'Disable' ? 'selected' : '' }}>Disable</option>
          </select>
        </div>

        <div class="input-group col-xl-6 col-sm-6 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text">Maintenance Message</span>
          </div>
          <input type="text" name="message" value="{{ $user['message'] }}" class="form-control form-control-lg" placeholder="Maintenance Message">
        </div>
      </div>
        <input type="hidden" name="id" value="{{ $user->id }}">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary btn-lg">Save</button>
</form>
@endsection
