@extends('layouts.app')
@section('dashboard', 'active')
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
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Selamat datang {{ auth()->user()->name }}</h2>
                    </div>
                    <div class="col-auto">
                        <form class="form-inline">
                            <div class="form-group d-none d-lg-inline">
                                <label for="reportrange" class="sr-only">Date Ranges</label>
                                <div id="reportrange" class="px-2 py-2 text-muted">
                                    <span class="small"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-sm"><span
                                        class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                                <button type="button" class="btn btn-sm mr-2"><span
                                        class="fe fe-filter fe-16 text-muted"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- widgets -->
                <div class="row">
                    <div class="col-md-6 col-6 p-1">
                        <div class="card shadow  ">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">

                                        @if (isset($absen->in))
                                            <span class="circle circle-sm bg-success-light">
                                                <i class="fe fe-24 fe-check text-white mb-0"></i>
                                            </span>
                                        @else
                                            <span class="circle circle-sm bg-danger">
                                                <i class="fe fe-24 fe-x text-white mb-0"></i>
                                            </span>
                                        @endif


                                    </div>
                                    <div class="col pr-0">
                                        <p class="small  text-muted  mb-0">Absen Masuk</p>
                                        <span class="h3 mb-0 ">
                                            @if (isset($absen->in))
                                                {{ $absen->in }}
                                            @else
                                                Belum Absen
                                            @endif


                                        </span>
                                        @if (isset($absen->status))
                                            @if ($absen->status == 'Hadir')
                                                <span class="small badge badge-success">{{$absen->status}}</span>
                                            @elseif ($absen->status == 'Terlambat')
                                                <span class="small badge badge-danger">{{$absen->status}}</span>
                                            @elseif ($absen->status == 'Izin')
                                                <span class="small badge badge-info">{{$absen->status}}</span>
                                                @elseif ($absen->status == 'Sakit')
                                                <span class="small badge badge-secondary">{{$absen->status}}</span>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-6 p-1">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                        @if (isset($absen->out))
                                            <span class="circle circle-sm bg-success-light">
                                                <i class="fe fe-24 fe-check text-white mb-0"></i>
                                            </span>
                                        @else
                                            <span class="circle circle-sm bg-danger">
                                                <i class="fe fe-24 fe-x text-white mb-0"></i>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col pr-0">
                                        <p class="small text-muted mb-0">Absen Pulang</p>
                                        <span class="h3 mb-0 ">
                                            @if (isset($absen->out))
                                                {{ $absen->out }}
                                            @else
                                                Belum Absen
                                            @endif


                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                
            </div> <!-- .container-fluid -->

        @endsection
