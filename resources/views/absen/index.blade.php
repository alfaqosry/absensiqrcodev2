@extends('layouts.app')
@section('manajemenabsen', 'active')
@section('content')
    <!-- Page Heading -->
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
    @endif
    @if (session('gagal'))
        <div class="alert alert-warning" role="alert">
            {{ session('gagal') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row">
              <!-- Small table -->
              <div class="col-md-12 my-4">
                <h2 class="h4 mb-1 mb-3">Izinkan Karyawan</h2>
                {{-- <p class="mb-3">Additional table rendering with vertical border, rich content formatting for cell</p> --}}
              
                <div class="card shadow">
                  <div class="card-body">
                    <div class="toolbar">
                      {{-- <form class="form">
                        <div class="form-row">
                          <div class="form-group col-auto mr-auto">
                            <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref1">Show</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelectPref1">
                              <option value="">...</option>
                              <option value="1">12</option>
                              <option value="2" selected>32</option>
                              <option value="3">64</option>
                              <option value="3">128</option>
                            </select>
                          </div>
                          <div class="form-group col-auto">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control" id="search1" value="" placeholder="Search">
                          </div>
                        </div>
                      </form> --}}
                    </div>
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                      <thead>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="all2">
                              <label class="custom-control-label" for="all2"></label>
                            </div>
                          </td>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($user as $item)
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="2474">
                              <label class="custom-control-label" for="2474"></label>
                            </div>
                          </td>
                          <td>
                            {{-- <div class="avatar avatar-md">
                              <img src="./assets/avatars/face-3.jpg" alt="..." class="avatar-img rounded-circle">
                            </div> --}}
                            {{ $loop->iteration }}
                          </td>
                          <td>
                            <p class="mb-0 text-muted"><strong>{{ $item->name }}</strong></p>
                           
                          </td>
                          <td>{{ $item->jabatan }}</td>
                          <td>
                            <a href="{{route('izinabsen', $item->id)}}"  class="btn mb-2 btn-primary"><span class="fe fe-edit-2 fe-16 mr-2"></span>Izinkan Karyawan</a>
                          </td>
                        
                         
                        
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{-- <nav aria-label="Table Paging" class="mb-0 text-muted">
                      <ul class="pagination justify-content-center mb-0">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                    </nav> --}}
                  </div>
                </div>
    



@endsection
