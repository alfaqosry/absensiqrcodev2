

        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
              <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
              <!-- nav bar -->
              <div class="w-100 mb-4 d-flex">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                  {{-- <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                    <g>
                      <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                      <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                      <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                  </svg> --}}
                </a>
              </div>
    
              
              {{-- <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">
                  <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
                  </a>

                  <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                    <li class="nav-item active">
                      <a class="nav-link pl-3" href="./index.html"><span class="ml-1 item-text">Default</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./dashboard-analytics.html"><span class="ml-1 item-text">Analytics</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./dashboard-sales.html"><span class="ml-1 item-text">E-commerce</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./dashboard-saas.html"><span class="ml-1 item-text">Saas Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./dashboard-system.html"><span class="ml-1 item-text">Systems</span></a>
                    </li>
                  </ul>
                </li>
              </ul> --}}
              <p class="text-muted nav-heading mt-4 mb-1">
                <span>componens</span>
              </p>
              <ul class="navbar-nav flex-fill w-100 mb-2">
                {{-- <li class="nav-item dropdown">
                  <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-box fe-16"></i>
                    <span class="ml-3 item-text">UI elements</span>
                  </a>
                  <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Colors</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./ui-typograpy.html"><span class="ml-1 item-text">Typograpy</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./ui-icons.html"><span class="ml-1 item-text">Icons</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./ui-buttons.html"><span class="ml-1 item-text">Buttons</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./ui-notification.html"><span class="ml-1 item-text">Notifications</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./ui-modals.html"><span class="ml-1 item-text">Modals</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./ui-tabs-accordion.html"><span class="ml-1 item-text">Tabs & Accordion</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="./ui-progress.html"><span class="ml-1 item-text">Progress</span></a>
                    </li>
                  </ul>
                </li> --}}


                @if (auth()->user()->role == "Kepala Desa")
                <li class="nav-item w-100 @yield('dashboard')">
                  <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                    {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                  </a>
                </li>

                <li class="nav-item w-100 @yield('absensaya')">
                  <a class="nav-link" href="{{route('kades-absen')}}">
                    <i class="fe fe-layers fe-16"></i>
                    <span class="ml-3 item-text">Data Absen </span>
                    {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                  </a>
                </li>

                <li class="nav-item w-100 @yield('user')">
                    <a class="nav-link" href="{{route('kades-karyawan')}}">
                      <i class="fe fe-user fe-16"></i>
                      <span class="ml-3 item-text">Lihat Data Karyawan</span>
                      {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                    </a>
                  </li>

                  <li class="nav-item w-100 @yield('tasemeter')">
                    <a class="nav-link" href="{{route('kades-tasemeter')}}">
                      <i class="fe fe-user fe-16"></i>
                      <span class="ml-3 item-text">Lihat Laporan Absensi</span>
                      {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                    </a>
                  </li>

                @endif
              

                @if (auth()->user()->role == "Pegawai")
                <li class="nav-item w-100 @yield('dashboard')">
                  <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                    {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                  </a>
                </li>

                <li class="nav-item w-100 @yield('absensaya')">
                  <a class="nav-link" href="{{route('absen')}}">
                    <i class="fe fe-layers fe-16"></i>
                    <span class="ml-3 item-text"> Data Absen </span>
                    {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                  </a>
                </li>
                <li class="nav-item w-100 @yield('user')">
                    <a class="nav-link" href="{{route('pegawai-karyawan')}}">
                      <i class="fe fe-user fe-16"></i>
                      <span class="ml-3 item-text">Lihat Data Karyawan</span>
                      {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                    </a>
                  </li>

                

                
                @endif


                @if (auth()->user()->role == "Sekdes")

                <li class="nav-item w-100 @yield('dashboard')">
                  <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                    {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                  </a>
                </li>

                <li class="nav-item dropdown @yield('tasmeter')">
                  <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link active ">
                    <i class="fe fe-layers fe-16"></i>
                    <span class="ml-3 item-text">Data absensi</span>
                  </a>
                  <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="{{route('tasemeter')}}"><span class="ml-1 item-text"> Atur periode Absensi</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="{{route('manajemenabsen')}}"><span class="ml-1 item-text">Input izin Absensi</span></a>
                    </li>
                  </ul>
                </li>

                {{-- <li class="nav-item w-100 @yield('tasmeter')">
                  <a class="nav-link" href="{{route('tasemeter')}}">
                    <i class="fe fe-layers fe-16"></i>
                    <span class="ml-3 item-text">Absensi</span> --}}
                    {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                  {{-- </a>
                </li> --}}

                <li class="nav-item w-100 @yield('user')">
                    <a class="nav-link" href="{{route('pengguna.index')}}">
                      <i class="fe fe-user fe-16"></i>
                      <span class="ml-3 item-text">Kelola Data Karyawan</span>
                      {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                    </a>
                  </li>

                  <li class="nav-item w-100 @yield('pengaturan')">
                    <a class="nav-link" href="{{route('pengaturan')}}">
                      <i class="fe fe-settings fe-16"></i>
                      <span class="ml-3 item-text">Atur jadwal absen</span>
                      {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                    </a>
                  </li>

                  <div class="btn-box w-100 mt-4 mb-1">
                <a href="{{route('qr')}}" target="_blank"  class="btn mb-2 btn-primary btn btn-block">
                  <i class="bx bx-qr-scan  mr-2"></i><span class="small">Unggah QR Monitor</span>
                </a>
                <a href="{{route('send-event')}}" target="_blank"  class="btn mb-2 btn-primary btn btn-block">
                  <i class="bx bx-qr-scan  mr-2"></i><span class="small">Reset QR</span>
                </a>
              </div>

                @endif

           
              
            </nav>
          </aside>
          