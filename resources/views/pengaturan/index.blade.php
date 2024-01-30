@extends('layouts.app')
@section('pengaturan', 'active')
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
                        <h2 class="h4 mb-1 mb-3">Jadwal Absen</h2>
                        {{-- <p class="mb-3">Additional table rendering with vertical border, rich content formatting for cell</p> --}}
                        <a href="{{ route('pengaturan.create') }}" class="btn mb-2 btn-primary"><span
                                class="fe fe-plus fe-16 mr-2"></span>Tambah Jadwal </a>
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Hari</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengaturan as $item)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <p class="mb-0 text-muted"><strong>{{ $item->hari }}</strong></p>
                                                </td>
                                                <td>
                                                    <p class="mb-0 text-muted">{{ $item->in }}</p>
                                                </td>
                                                <td>
                                                    <p class="mb-0 text-muted">{{ $item->out }}</p>
                                                </td>

                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item"
                                                            href="{{ route('pengaturan.edit', $item->id) }}">Edit</a>
                                                        {{-- <a class="dropdown-item" href="{{ route('pengaturan.delete', $item->id) }}">Remove</a> --}}
                                                        {{-- <a class="dropdown-item" href="#">Assign</a> --}}
                                                    </div>
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
