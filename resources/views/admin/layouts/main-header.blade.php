  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light w-full">
      <!-- Left navbar links -->
      <ul class="navbar-nav flex" style="width: 100%;justify-content: space-between;">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          {{-- <li class="nav-item d-none d-sm-inline-block">
              <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Contact</a>
          </li> --}}
          @if (auth()->user())
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-outline-secondary">Đăng xuất</button>
              </form>
          @endif
      </ul>

  </nav>
