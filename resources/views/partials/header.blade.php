<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

  <!-- admin list -->
  <div class="input-group mb-auto text-center">
    <div class="input-group-sm">
      <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Admin</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('admin.index') }}">Account</a>
        <a class="dropdown-item" href="{{ route('changePassword') }}">change password</a>
        <li>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
      </div>
    </div>
  </div>
  <!-- Navbar Search -->
  @include('partials.search')
</nav>
