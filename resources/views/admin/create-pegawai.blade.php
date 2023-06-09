@extends('template/index')
@section('content')
<div class="layout-page">
    <nav
      class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
      id="layout-navbar"
    >
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
          <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input
              type="text"
              class="form-control border-0 shadow-none"
              placeholder="Search..."
              aria-label="Search..."
            />
          </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="{{asset('assets/img/avatars/Profil.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="#">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="{{asset('assets/img/avatars/Profil.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block">{{ auth()->user()->name}}</span>
                      <small class="text-muted">{{ auth()->user()->level}}</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <i class="bx bx-user me-2"></i>
                  <span class="align-middle">My Profile</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <i class="bx bx-cog me-2"></i>
                  <span class="align-middle">Settings</span>
                </a>
              </li>

              <li>
                <a class="dropdown-item" href="{{route('logout')}}">
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>
    </nav>

    <!-- / Navbar -->

    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Content -->

      <div class="container-xxl container-p-y">
        <div class="card card-body">
          <H1 class="text-capitalize text-center">INPUT DATA PEGAWAI</H1>
          <hr>
          {{-- form PEGAWAI MULAI --}}
      
@if ($errors->any())
    <div class="pt-3">
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $item)
              <li>{{$item}}</li>
          @endforeach
        </ul>
      </div>
    </div>
@endif

        <form id="formAuthentication" class="mb-3" action="{{ url('admin')}}" method="POST">
            @csrf
          <div class="card mb-4">
            <div class="mb-3 row">
              <div class="card-header">
               <a href='{{url('admin/')}}'class="btn btn-primary btn-md "><-- KEMBALI</a>
              </div>
            </div>
            <div class="card-body">
              <div class="mb-3 row">
                <label for="nip" class="col-md-2 col-form-label">NIP</label>
                <div class="col-md-10">
                  <input class="form-control" type="text" value="{{ Session::get('nip') }}" name="nip" id="nip" />
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nama" class="col-md-2 col-form-label">Nama</label>
                <div class="col-md-10">
                  <input class="form-control" type="text" value="{{ Session::get('nama') }}" name="nama" id="nama" />
                </div>
              </div>
              <div class="mb-3 row">
                <label for="jk" class="col-md-2 col-form-label">Jenis Kelamin</label>
                <div class="col-md-10">
                  <input class="form-control" type="text" value="{{ Session::get('jk') }}" name="jk" id="jk" />
                </div>
              </div>
              <div class="mb-3 row">
                <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                <div class="col-md-10">
                  <input class="form-control" type="text" value="{{ Session::get('alamat') }}" name="alamat" id="alamat" />
                </div>
              </div>
              <div class="mb-3 row">
                <label for="telepon" class="col-md-2 col-form-label">Telepon</label>
                <div class="col-md-10">
                  <input class="form-control" type="text" value="{{ Session::get('telepon') }}" name="telepon" id="telepon" />
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="card-header">
                <button class="btn btn-primary d-grid w-40" type="submit">SIMPAN</button>
              </div>
            </div>
          </div>
          </form>
          {{-- form PEGAWAI AKHIR --}}
      </div>
      </div>
      <!-- / Content -->

      <!-- Footer -->
      <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
          <div class="mb-2 mb-md-0">
            ©
            <script>
              document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
          </div>
          <div>
            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

            <a
              href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
              target="_blank"
              class="footer-link me-4"
              >Documentation</a
            >

            <a
              href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
              target="_blank"
              class="footer-link me-4"
              >Support</a
            >
          </div>
        </div>
      </footer>
      <!-- / Footer -->

      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
  </div>
@endsection