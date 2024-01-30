@extends('layouts.app')
@section('index_show','show')
@section('index','active')
@section('absen','active')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ $tasemeter->tahun_ajaran}}</h1>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <a href="{{route('cetak', $id)}}" class="btn btn-primary" >Cetak</a>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
             <tr>
                        <th>Nama</th>
                        @foreach ($jadwal as $j )
                        <td>{{ $j->tanggal."/".$j->bulan }}</td>
                        @endforeach

                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $item)
                    <tr>
                        {{-- <td>{{$loop->iteration}}</td> --}}

                        <th>{{$item->name}}</th>
                        @foreach ($jadwal as $j )
                        @php

                        $dataabsen = App\Models\Dataabsen::select('*')
                        ->where('jadwal_id', '=', $j->id)
                        ->where('user_id', '=', $item->id)
                        ->first();

                        @endphp

                        {{-- @dd($dataabsen) --}}

                        <td @if ($j->hari == "Sunday")
                            class="bg-danger"
                            @endif >
                            <a href=""  @if (isset($dataabsen->status) && $dataabsen->status == "Hadir" )
                                class=" btn btn-success"
                                @elseif ( isset($dataabsen->status) && $dataabsen->status == "Terlambat" )
                                class=" btn btn-warning"
                                @elseif ( isset($dataabsen->status) && $dataabsen->status == "Izin" )
                                class=" btn btn-info"
    
                                @elseif ( isset($dataabsen->status) && $dataabsen->status == "Sakit" )
                                class=" btn btn-secondary"
    
                                @endif > 
                            
                            
                            @if ($dataabsen)

                            @if ($dataabsen->status == "Hadir" )
                            <center>H</center>

                            @elseif ($dataabsen->status == "Terlambat" )
                            <center>T</center>

                            @elseif ($dataabsen->status == "Izin" )
                            <center>I</center>
                            @elseif ($dataabsen->status == "Sakit" )
                            <center>S</center>
                            @endif

                            @endif
                        </a></td>
                        

                        @endforeach





















                        {{-- <td>
                            <a href="{{route('tasemeter.edit', $item->id)}}" class="btn btn-warning btn-sm"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <a href="{{route('tasemeter.delete', $item->id)}}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus Data ?')"><i class="fas fa-trash"></i> Hapus</a>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection