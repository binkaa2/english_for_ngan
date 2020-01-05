<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scroll-wrapper scrollbar-inner" style="position: relative;"><div class="scrollbar-inner scroll-content" style="height: 910px; margin-bottom: 0px; margin-right: 0px; max-height: none;">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="/" style="text-align: center;width: 100%;">
          <img src="http://qa2.3km.vn/static/logo.svg" />
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block active" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('cms') ? 'active' : '' }} collapsed" href="{{route('cms.index')}}">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
            @if(Session::get('role') == "admin")
            <li class="nav-item">
                <a class="nav-link {{ request()->is('cms/category') || request()->is('cms/category/*') ? 'active' : '' }} collapsed" href="{{route('category.index')}}">
                  <i class="ni ni-tag text-primary"></i>
                  <span class="nav-link-text">Category</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link {{ request()->is('cms/users') || (request()->is('cms/users/*') && request()->is('cms/users/report') == false) ? 'active' : '' }} collapsed" href="{{route('users.index')}}">
                <i class="ni ni-single-02 text-primary"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li>
            @if(Session::get('role') == "admin")
            <li class="nav-item">
                <a class="nav-link {{ request()->is('cms/users/report') ? 'active' : '' }} collapsed" href="{{route('users.report')}}">
                  <i class="ni ni-circle-08 text-primary"></i>
                  <span class="nav-link-text">Users Report</span>
                </a>
              </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ request()->is('cms/products') || (request()->is('cms/products/*') && request()->is('cms/products/report') == false) ? 'active' : '' }} collapsed" href="{{route('products.index')}}">
                  <i class="ni ni-box-2 text-primary"></i>
                  <span class="nav-link-text">Products</span>
                </a>
            </li>
            @if(Session::get('role') == "admin")
            <li class="nav-item">
                <a class="nav-link {{ request()->is('cms/products/report') ? 'active' : '' }} collapsed" href="{{route('products.report')}}">
                  <i class="ni ni-archive-2 text-primary"></i>
                  <span class="nav-link-text">Products Report</span>
                </a>
            </li>
            @endif
            @if(Session::get('role') == "admin")
            <li class="nav-item">
                <a class="nav-link {{ request()->is('cms/banners') || request()->is('cms/banners/*') ? 'active' : '' }} collapsed" href="{{route('banners.index')}}">
                  <i class="ni ni-image text-primary"></i>
                  <span class="nav-link-text">Banners</span>
                </a>
            </li>
            @endif
            <!-- <li class="nav-item">
              <a class="nav-link collapsed" href="https://demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/dashboard.html#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Users</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="https://demos.creative-tim.com/argon-dashboard-pro/pages/examples/pricing.html" class="nav-link">Pricing</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://demos.creative-tim.com/argon-dashboard-pro/pages/examples/login.html" class="nav-link">Login</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://demos.creative-tim.com/argon-dashboard-pro/pages/examples/register.html" class="nav-link">Register</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://demos.creative-tim.com/argon-dashboard-pro/pages/examples/lock.html" class="nav-link">Lock</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://demos.creative-tim.com/argon-dashboard-pro/pages/examples/timeline.html" class="nav-link">Timeline</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://demos.creative-tim.com/argon-dashboard-pro/pages/examples/profile.html" class="nav-link">Profile</a>
                  </li>
                </ul>
              </div>
            </li> -->
          </ul>

        </div>
      </div>
    </div><div class="scroll-element scroll-x"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 0px; left: 0px;"></div></div></div><div class="scroll-element scroll-y"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 0px;"></div></div></div></div>
  </nav>