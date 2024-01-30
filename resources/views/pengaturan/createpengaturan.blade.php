@extends('layouts.app')
@section('pengaturan', 'active')
@section('content')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Jadwal absensi</h2>
                <p class="text-muted">Masukkan Data Baru</p>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Jadwal Baru</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('pengaturan.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-row">
                                

                                <div class="form-group col-md-12">
                                    <label for="role">Hari</label>
                                    <select id="role" name="hari" class="form-control">
                                        <option value="">Choose...</option>
                                        <option >Senen</option>
                                        <option>Selasa</option>
                                        <option >Rabu</option>
                                        <option >Kamis</option>
                                        <option >Jumat</option>
                                        <option >Sabtu</option>
                                        <option >Minggu</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="in">Jam Masuk</label>
                                    <input class="form-control" id="in" type="time" name="in">
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="out">Jam Keluar</label>
                                    <input class="form-control" id="out" type="time" name="out">
                                  </div>


                                  
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                     
                       
                   
                  
                </form>

                </div>
            </div>

        </div> <!-- .row -->
    </div> <!-- .container-fluid -->


@endsection
