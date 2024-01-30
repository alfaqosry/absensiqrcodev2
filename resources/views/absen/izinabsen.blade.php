@extends('layouts.app')
@section('manajemenabsen', 'active')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Izin Karyawan</h2>
                {{-- <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide
                    variety of forms.</p> --}}
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Izinkan Absensi</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('izinabsen.update', $user->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="tanggal">Tanggal</label>
                                    <input class="form-control" id="tanggal" type="date" name="tanggal">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="Izin">Izin</option>
                                        <option value="Sakit">Sakit</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                <textarea class="form-control" id="example-textarea" rows="4" name="ket"> </textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>




                        </form>

                    </div>
                </div>

            </div> <!-- .row -->
        </div> <!-- .container-fluid -->


    @endsection
