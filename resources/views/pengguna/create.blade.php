@extends('layouts.app')
@section('user', 'active')
@section('content')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Tambah Karyawan</h2>
                <p class="text-muted">Silahkan masukkan Data Baru</p>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Tambah Karyawan</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('pengguna.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-row">
                                

                                    <div class="form-group col-md-6">
                                        <label for="name">Nama</label>
                                        <input name="name" type="text" class="form-control" id="name" required
                                            value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input name="email" type="text" class="form-control" id="email" required
                                            value="{{ old('email') }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="role">Role</label>
                                        <select id="role" name="role" class="form-control">
                                            <option value="">Choose...</option>
                                            <option >Kepala Desa</option>
                                            <option>Sekdes</option>
                                            <option >Pegawai</option>
                                        </select>
                                    </div>
                       
                                    <div class="form-group col-md-6">
                                        <label for="jabatan">Jabatan</label>
                                        <select id="role" name="jabatan" class="form-control">
                                            <option >Choose...</option>
                                            <option >Kepala Desa</option>
                                            <option >Sekretaris Desa</option>
                                            <option >Kasi Pemerintahan</option>
                                            <option >Kasi Pelayanan</option>
                                            <option >Kasi Kesejahteraan</option>
                                            <option >Kaur Perencanaan</option>
                                            <option >Kaur Keuangan</option>
                                            <option >Kaur Umum</option>
                                            <option >Kepala Dusun I</option>
                                            <option >Kepala Dusun II</option>
                                            <option >Kepala Dusun III</option>
                                            <option >Kepala Dusun VI</option>
                                            <option >Staff</option>
                                            
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="no_tlpn">No Telepon</label>
                                        <input name="no_tlpn" type="text" class="form-control" id="jabatan" required
                                            value="{{ old('no_tlpn') }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control" id="password" required>
                                    </div>
                                   
                                   
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                     
                       
                   
                  
                </form>

                </div>
            </div>

        </div> <!-- .row -->
    </div> <!-- .container-fluid -->


@endsection
