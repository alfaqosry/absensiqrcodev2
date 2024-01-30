@extends('layouts.app')
@section('index_show','show')
@section('index','active')
@section('absensaya','active')
@section('content')
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Absen Saya</h1>
                    @if(session('sukses'))
                    <div class="alert alert-success" role="alert">
                            {{session('sukses')}}
                    </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Priode</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tasemeter as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->priode}}</td>
                                            <td>
                                                @if(auth()->user()->role == "Sekdes")
                                                <a href="{{route('lihatabsen', $item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Lihat Absen</a>
                                                @elseif(auth()->user()->role == "Kepala Desa")
                                                <a href="{{route('kades-lihatabsen', $item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Lihat Absen</a>
                                                @elseif(auth()->user()->role == "Pegawai")
                                                <a href="{{route('pegawai-lihatabsen', $item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Lihat Absen</a>
                                               @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@endsection