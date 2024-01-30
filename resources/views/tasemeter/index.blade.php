@extends('layouts.app')
@section('index_show','show')
@section('index','active')
@section('tasmeter','active')
@section('content')
                    <!-- Page Heading -->
                 
                    @if(session('sukses'))
                    <div class="alert alert-success" role="alert">
                            {{session('sukses')}}
                    </div>
                    @endif
         

                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12 ">
                                <h2 class="h4 mb-1 mb-3">Periode Absensi</h2>
                                <a  href="{{route('tasemeter.create')}}" class="btn mb-2 btn-primary"><span class="fe fe-plus fe-16 mr-2"></span>Tambah Periode </a>
                                <div class="card shadow">
                                  
                                  <div class="card-body my-n2">
                                    <table class="table table-striped table-hover table-borderless">
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
                                            <td><strong>{{$item->priode}}</strong></td>
                                            <td>
                                                <div class="dropdown">
                                                  <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                  </button>
                                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                    {{-- <a class="dropdown-item" href="{{route('tasemeter.edit', $item->id)}}">Edit</a>
                                                    <a class="dropdown-item" href="{{route('tasemeter.delete', $item->id)}}">Remove</a> --}}
                                                    @if (auth()->user()->role == "Kepala Desa")
                                                    <a class="dropdown-item" href="{{route('kades-tasemeter.show', $item->id)}}">Lihat Absensi</a>
                                                    @elseif (auth()->user()->role == "Sekdes")
                                                    <a class="dropdown-item" href="{{route('tasemeter.show', $item->id)}}">Lihat Absensi</a>
                                                    @endif
                                                   
                                                  </div>
                                                </div>
                                              </td>

                                            
                                        </tr>
                                        @endforeach
                                      
                                       
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div> <!-- Striped rows -->
                            </div> <!-- .row-->
                          </div> <!-- .col-12 -->
                        </div> <!-- .row -->
                      </div> <!-- .container-fluid -->

@endsection