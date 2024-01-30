@extends('layouts.app')
@section('user', 'active')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">Edit Karyawan</h2>
            <p class="text-muted">Silahkan Masukkan Data Baru</p>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Edit Karyawan</strong>
                </div>
                <div class="card-body">
                    <form action="{{ Route('pengguna.update', $user->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-row">
                            

                                <div class="form-group col-md-6">
                                    <label for="name">Nama</label>
                                    <input name="name" type="text" class="form-control" id="name" required
                                        value="{{$user->name}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" class="form-control" id="email" required
                                        value="{{$user->email}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="role">Role</label>
                                    <select id="role" name="role" class="form-control">
                                        <option >{{$user->role}}</option>
                                            <option>Kepala Desa</option>
                                            <option>Sekdes</option>
                                            <option>Pegawai</option>
                                        </select>
                                    </select>
                                </div>
                   
                                <div class="form-group col-md-6">
                                    <label for="jabatan">Jabatan</label>
                                    <select id="jabatan" name="jabatan" class="form-control">
                                        <option value="{{$user->jabatan}}">{{$user->jabatan}}</option>
                                        <option>Kepala Desa</option>
                                        <option>Sekdes</option>
                                        <option>Pegawai</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="no_tlpn">No Telepon</label>
                                    <input name="no_tlpn" type="text" class="form-control" id="jabatan"
                                        value="{{ $user->no_tlpn}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password">
                                </div>
                               
                               
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                 
                   
               
              
            </form>

            </div>
        </div>

    </div> <!-- .row -->
</div> <!-- .container-fluid -->


@endsection

