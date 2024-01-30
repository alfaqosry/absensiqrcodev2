@extends('layouts.app')
@section('user', 'active')
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
            <div class="col-12 col-lg-10 col-xl-8">
              <h2 class="h3 mb-4 page-title">Profile</h2>
              <div class="my-4">
                <form>
                  <div class="row mt-5 align-items-center">
                    <div class="col-md-3 text-center mb-5">
                      <div class="avatar avatar-xl">
                        <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
                      </div>
                    </div>
                    <div class="col">
                      <div class="row align-items-center">
                        <div class="col-md-7">
                          <h4 class="mb-1">{{ auth()->user()->name }}</h4>
                          <p class="small mb-3"><span class="badge badge-dark">{{ auth()->user()->role }}</span></p>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-7">

                        </div>
                        <div class="col">
                          <p class="small mb-0 text-muted">{{ auth()->user()->email }}</p>
                          <p class="small mb-0 text-muted">{{ auth()->user()->jabatan }}</p>
                          <p class="small mb-0 text-muted">{{ auth()->user()->no_tlpn }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                  <form action="{{ Route('pengguna.update', auth()->user()->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-row">
                            

                                <div class="form-group col-md-6">
                                    <label for="name">Nama</label>
                                    <input name="name" type="text" class="form-control" id="name" required
                                        value="{{auth()->user()->name}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" class="form-control" id="email" required
                                        value="{{auth()->user()->email}}">
                                </div>

                                


                                <div class="form-group col-md-6">
                                    <label for="no_tlpn">No Telepon</label>
                                    <input name="no_tlpn" type="text" class="form-control" id="jabatan"
                                        value="{{auth()->user()->no_tlpn}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password">
                                </div>
                               
                                <button type="submit" class="btn btn-primary">Simpan</button>
              </div> <!-- /.card-body -->
            </div> <!-- /.col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->



@endsection
