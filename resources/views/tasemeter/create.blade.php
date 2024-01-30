@extends('layouts.app')
@section('index_show', 'show')
@section('index', 'active')
@section('tasemeter', 'active')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Priode Absensi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="{{ route('tasemeter.store') }}" method="post">
            {{ csrf_field() }}

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="priode">Priode</label>
                        <input value="{{ old('priode') }}" name="priode" type="text" class="form-control"
                            placeholder="Input priode" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="tglmulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tglmulai" name="tglmulai" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="tglberakhir" class="form-label">Tanggal berakhir</label>
                        <input type="date" class="form-control" id="tglberakhir" name="tglberakhir" required>
                    </div>


                       
                    </div>
                    <button type="submit" class="btn btn-primary"><span class="fe fe-save fe-16 mr-2"></span>Simpan</button>
                </div>
            </div>
        </form>

    </div>

@endsection
