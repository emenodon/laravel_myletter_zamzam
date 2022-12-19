<ul class="sidebar-menu">
  <li class="menu-header">Dashboard</li>
  <li class="nav-item dropdown">
    <a href="{{ route('dashboard.index') }}" class="nav-link">
      <i class="fas fa-home"></i>
      <span>Dashboard</span>
    </a>
  </li>
  @can('manage-all')
  <li class="nav-item dropdown {{ request()->is('suratmasuk') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown">
      <i class="fas fa-envelope"></i>
      <span>Surat Masuk</span>
    </a>

    <ul class="dropdown-menu">
      <li>
        <a class="nav-link {{ request()->is('suratmasuk.index') ? 'active' : '' }}"  href="{{route('suratmasuk.index')}}">
          Home Surat Masuk
        </a>
      </li>
    </ul>

    <ul class="dropdown-menu">
      <li>
        <a class="nav-link {{ request()->is('suratmasuk.create') ? 'active' : '' }}"  href="{{route('suratmasuk.create')}}">
          Tambah Surat Masuk
        </a>
      </li>
    </ul>
  </li>
  @endif

  @can('manage-separate')
  <li class="nav-item dropdown {{ request()->is('userarea.suratmasuk') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown">
      <i class="fas fa-envelope"></i>
      <span>Surat Masuk</span>
    </a>

    <ul class="dropdown-menu">
      <li>
        <a class="nav-link {{ request()->is('suratmasukuser.index') ? 'active' : '' }}"  href="{{route('suratmasukuser.index')}}">
          Home Surat Masuk
        </a>
      </li>
    </ul>

    <ul class="dropdown-menu">
      <li>
        <a class="nav-link {{ request()->is('suratmasukuser.create') ? 'active' : '' }}"  href="{{route('suratmasukuser.create')}}">
          Tambah Surat Masuk
        </a>
      </li>
    </ul>
  </li>
  @endif
{{-- 
     <ul class="dropdown-menu">
      <li>
      <a class="nav-link {{ request()->is('suratmasuk.update') ? 'active' : '' }}"  href="{{route('suratmasuk.update')}}">
        Edit Surat Masuk
      </a>
      </li>
    </ul> --}}

    
    <li class="nav-item dropdown {{ request()->is('suratkeluar') ? 'active' : '' }}">
      <a href="#" class="nav-link has-dropdown">
        <i class="far fa-envelope"></i>
        <span>Surat Keluar</span>
      </a>

      <ul class="dropdown-menu">
        <li>
          <a class="nav-link {{ request()->is('suratkeluar.index') ? 'active' : '' }}"  href="{{route('suratkeluar.index')}}">
            Home Surat Keluar
          </a>
        </li>
        <li>
          <a class="nav-link {{ request()->is('suratkeluar.create') ? 'active' : '' }}"  href="{{route('suratkeluar.create')}}">
            Tambah Surat Keluar
          </a>
        </li>
      </ul>

    </li>

    @can('manage-all')
    <li class="nav-item dropdown {{ request()->is('klasifikasisurat') ? 'active' : '' }}">
      <a href="#" class="nav-link has-dropdown">
        <i class="fas fa-clipboard-list"></i>
        <span>Klasifikasi Surat</span>
      </a>

      <ul class="dropdown-menu">
        <li>
          <a class="nav-link {{ request()->is('klasifikasisurat.index') ? 'active' : '' }}"  href="{{route('klasifikasisurat.index')}}">
            Manajemen Subject Surat
          </a>
        </li>
        <li>
          <a class="nav-link {{ request()->is('klasifikasisurat.create') ? 'active' : '' }}"  href="{{route('klasifikasisurat.create')}}">
            Tambah Subject
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item dropdown {{ request()->is('usermanagement') ? 'active' : '' }}">
      <a href="#" class="nav-link has-dropdown">
        <i class="fas fa-user"></i>
        <span>User Management</span>
      </a>


      <ul class="dropdown-menu">
        <li>
          <a class="nav-link {{ request()->is('usermanagement.index') ? 'active' : '' }}"  href="{{route('usermanagement.index')}}">
            User
          </a>
        </li>
        <li>
          <a class="nav-link {{ request()->is('usermanagement.create') ? 'active' : '' }}"  href="{{route('usermanagement.create')}}">
            Tambah User
          </a>
        </li>
      </ul>
    </li>
    @endif

    @can('manage-separate')
    <li class="nav-item dropdown {{ request()->is('managementuser') ? 'active' : '' }}">
      <a href="{{ route('manageuser.edit', Auth::user()->id) }}" class="nav-link">
        <i class="fas fa-fire"></i>
        <span>Management User</span>
      </a>
    </li>
    @endif

  </ul>