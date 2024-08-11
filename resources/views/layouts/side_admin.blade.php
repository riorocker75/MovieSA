<nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="{{url('/dashboard')}}" class="b-brand text-primary">
          <!-- ========   Change your logo from here   ============ -->
          {{-- <img src="../assets/images/logo-white.svg" alt="logo image" class="logo-lg"> --}}
          <span class="badge bg-primary rounded-pill ms-2 theme-version">MovieSA</span>
        </a>
      </div>
  
      <div class="card pc-user-card">
        <div class="card-body">
          <div class="nav-user-image">
            <a data-bs-toggle="collapse" href="#navuserlink">
              {{-- <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar rounded-circle"> --}}
            </a>
          </div>
          <div class="pc-user-collpsed collapse" id="navuserlink">
            <h4 class="mb-0">{{"admin"}}</h4>
            <span>Administrator</span>
            <ul>
            
              <li><a href="{{url('logout/admin')}}" class="pc-user-links">
                  <i class="ph-duotone ph-power"></i>
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item pc-caption">
            <label>Navigation</label>
          </li>
          <li class="pc-item pc-hasmenu">
            <a href="{{url('/dashboard')}}" class="pc-link">
              <span class="pc-micon">
                <i class="ph-duotone ph-gauge"></i>
              </span>
              <span class="pc-mtext">Dashboard</span>
              {{-- <span class="pc-arrow"><i data-feather="chevron-right"></i></span> --}}
            </a>
           
          </li>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon">
                <i class="ph-duotone ph-layout"></i>
              </span>
              <span class="pc-mtext">Post</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="{{url('/dashboard/admin/all/post')}}">Semua Post</a></li>
              <li class="pc-item"><a class="pc-link" href="{{url('/dashboard/admin/movie_post/add')}}">New Movie Post</a></li>
              <li class="pc-item"><a class="pc-link" href="{{url('/dashboard/admin/blog_post/add')}}">New Blog Post</a></li>
              <li class="pc-item"><a class="pc-link" href="{{url('/dashboard/admin/categori/add')}}">Categori</a></li>

            </ul>
          </li>
          {{-- <li class="pc-item pc-caption">
            <label>User</label>
            <i class="ph-duotone ph-chart-pie"></i>
            <span>Advance Card</span>
          </li> --}}
        
          <li class="pc-item">
            <a href="#" class="pc-link">
              <span class="pc-micon">
                <i class="ph-duotone ph-users-three"></i>
              </span>
              <span class="pc-mtext">User</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="#" class="pc-link">
              <span class="pc-micon">
                <i class="ph-duotone ph-identification-card"></i>
              </span>
              <span class="pc-mtext">Histori</span>
            </a>
          </li>
         
          
        </ul>
      
      </div>
    </div>
  </nav>

  <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
<header class="pc-header">
    <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
  <div class="me-auto pc-mob-drp">
    <ul class="list-unstyled">
      <!-- ======= Menu collapse Icon ===== -->
      <li class="pc-h-item pc-sidebar-collapse">
        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
          <i class="ph-duotone ph-list"></i>
        </a>
      </li>
      <li class="pc-h-item pc-sidebar-popup">
        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
          <i class="ph-duotone ph-list"></i>
        </a>
      </li>
   
    </ul>
  </div>
  <!-- [Mobile Media Block end] -->
  <div class="ms-auto">
    <ul class="list-unstyled">
      <li class="dropdown pc-h-item">
        <a
          class="pc-head-link dropdown-toggle arrow-none me-0"
          data-bs-toggle="dropdown"
          href="#"
          role="button"
          aria-haspopup="false"
          aria-expanded="false"
        >
          <i class="ph-duotone ph-sun-dim"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
          <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
            <i class="ph-duotone ph-moon"></i>
            <span>Dark</span>
          </a>
          <a href="#!" class="dropdown-item" onclick="layout_change('light')">
            <i class="ph-duotone ph-sun-dim"></i>
            <span>Light</span>
          </a>
        
        </div>
      </li>
      <li class="dropdown pc-h-item">
        <a
          class="pc-head-link dropdown-toggle arrow-none me-0"
          data-bs-toggle="dropdown"
          href="#"
          role="button"
          aria-haspopup="false"
          aria-expanded="false"
        >
          <i class="ph-duotone ph-diamonds-four"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
          {{-- <a href="#!" class="dropdown-item">
            <i class="ph-duotone ph-user"></i>
            <span>My Account</span>
          </a>
          <a href="#!" class="dropdown-item">
            <i class="ph-duotone ph-gear"></i>
            <span>Settings</span>
          </a>
          <a href="#!" class="dropdown-item">
            <i class="ph-duotone ph-lifebuoy"></i>
            <span>Support</span>
          </a>
          <a href="#!" class="dropdown-item">
            <i class="ph-duotone ph-lock-key"></i>
            <span>Lock Screen</span>
          </a> --}}
          <a href="{{url('logout/admin')}}" class="dropdown-item">
            <i class="ph-duotone ph-power"></i>
            <span>Logout</span>
          </a>
        </div>
      </li>
    
    </ul>
  </div> </div>
  </header>
  <!-- [ Header ] end -->