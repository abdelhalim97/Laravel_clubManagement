@extends('../general.app-dashboard')
@section('content')
<aside class="main-sidebar bg-pink elevation-4">
    {{-- <a class="nav-link hover:text-white text-left mt-1 " style="color:#c2c7d0" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
        Dashboard
    </a> --}}

    <div class="sidebar">
      <div class="user-panel pb-3 flex justify-between">
        <img resize="cover" class="w-14 mt-2" src="https://www.polytecsousse.tn/wp-content/uploads/2020/09/logo-polytechnique-blanc.png"/>
        <div class="info text-purple mt-2 text-lg p-0">
            {{ Auth::user()->name }}
          {{-- <a href="#" class="d-block "></a> --}}
        </div>
        <div></div>
        <div></div>

      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/dashboard/users-dashboard" class="nav-link text-purple hover:text-fuchsia">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Users Dashboard
                  </p>
                </a>
              </li>
            <li class="nav-item menu-is-opening menu-open ">
            <a href="#" class="nav-link text-purple hover:text-fuchsia">
              <i class="nav-icon fas fa-users"></i>
              <p >
                Clubs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item ml-2">
                <a href="/dashboard/add-club" class="nav-link text-purple hover:text-fuchsia">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Add Club</p>
                </a>
              </li>
              <li class="nav-item ml-2">
                <a href="/dashboard/clubs-dashboard" class="nav-link text-purple hover:text-fuchsia">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Clubs Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link text-purple hover:text-fuchsia">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p >
                Events
                <i class="right fas fa-angle-left"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item ml-2">
                <a href="/dashboard/add-event" class="nav-link text-purple hover:text-fuchsia">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Add Event</p>
                </a>
              </li>
              <li class="nav-item ml-2">
                <a href="/dashboard/events-dashboard" class="nav-link text-purple hover:text-fuchsia">
                  <i class="fas fa-tachometer-alt nav-icon"></i>

                  <p>Events Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="xl:max-w-screen-lg lg:max-w-screen-md md:max-w-screen-sm px-1 md:px-0  w-full mx-auto ">
        @yield('content1')

  </div>
  {{-- <div class="content-wrapper" style="min-height: 100%;">

  </div> --}}
  @endsection()

