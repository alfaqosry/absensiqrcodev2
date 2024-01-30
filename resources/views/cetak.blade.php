<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Karyawan</title>
    


    <style>
        table {
  border-collapse: collapse;
}
tr {
  border: 1px solid black;
}
th, td {
  text-align: left;
  padding: 4px;
  border: 1px solid black;
}

.bg-danger{
    background-color: brown;
}

.bg-warning{
    background-color: yellow;
}

.bg-success{
    background-color: green;
    color: white;
}

.bg-info{
    background-color: blue;
    color: white;
}

.bg-secondary{
    background-color: grey;
}
.page-break {
    page-break-after: always;
}
    </style>
</head>
<body>
    

    @foreach ($bulan as $b)
        
    <center>
    <h3> ABSENSI KARYAWAN DESA BINAMANG</h3>
    <p>Perangkat Desa dan Staff Desa Binamang Kecamatan XIII Koto Kampar</p>
    </center>
     
<table width="100%" cellspacing="0">
                <thead>
             <tr>
                <th>NO</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        
                            
                        @foreach ($jadwal as $j )
                        @if ($j->bulan == $b->bulan)
                        <td>{{ $j->tanggal."/"}} <br> {{$j->bulan }}</td>
                        @endif
                        
                        @endforeach
                        
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $item)
                    @if($item->id != 1)
                    <tr>
                        <td>{{$loop->iteration }}</td>

                        <td >{{$item->name}}</td>

                        <td>{{$item->jabatan}}</td>

                        @foreach ($jadwal as $j )
                        @php

                        $dataabsen = App\Models\Dataabsen::select('*')
                        ->where('jadwal_id', '=', $j->id)
                        ->where('user_id', '=', $item->id)
                        ->first();

                        @endphp

                        {{-- @dd($dataabsen) --}}

                        @if ($j->bulan == $b->bulan)
                            
                        

                        <td @if ($j->hari == "Sunday")
                            class="bg-danger"
                            @endif >
                            <div @if (isset($dataabsen->status) && $dataabsen->status == "Hadir" )
                                class=" bg-success"
                                @elseif ( isset($dataabsen->status) && $dataabsen->status == "Terlambat" )
                                class=" bg-warning"
                                @elseif ( isset($dataabsen->status) && $dataabsen->status == "Izin" )
                                class=" bg-info"
    
                                @elseif ( isset($dataabsen->status) && $dataabsen->status == "Sakit" )
                                class=" bg-secondary"
    
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
                            </div></td>
                        
                        
                            @endif
                        @endforeach

                    </tr>
                    @endif

                    @endforeach
                </tbody>
            </table>

            <p style="text-align: right;">Binamang, 
               {{date('d M Y',time()); }} </p> 
        <P style="text-align: right;"><b >Kepala Desa Binamang</b> </P>
        @foreach ($user as $u)
        @if ($u->jabatan == "Kepala Desa")
            
        
        <p style="text-align: right; margin-top: 100px"><b >{{$u->name}} </b> </p>
        @endif
        @endforeach
        
            <div class="page-break"></div>
            @endforeach

        
</body>
</html>