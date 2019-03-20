<ul class="sidebar navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('admin.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

    <li class="nav-item active">
      <a class="nav-link" href="{{ route('admin.setting')}} ">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Settings</span>
      </a>
    </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Categories</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="{{ route('category.index') }}">show all categories</a>
      <a class="dropdown-item" href="{{ route('category.create') }}">add new category</a>
    </div>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>News</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="{{ route('new.index') }}">show all news</a>
      <a class="dropdown-item" href="{{ route('new.create') }}">add new new</a>
    </div>
  </li>

  <li class="nav-item">
    
    <a class="nav-link" href="{{ route('logout') }}"
     onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
      <i class="fas fa-fw fa-table"></i>
      <span>{{ __('Logout') }}</span></a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
  </li>
</ul>
