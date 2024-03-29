<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Dataabsen;
use App\Models\Tasemeter;
use Illuminate\Http\Request;

class Absencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tasemeter = Tasemeter::all();
        return view('absensaya', compact('tasemeter'));
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $tasemeter = Tasemeter::find($id);
        $jadwal = Jadwal::where('tasemeter_id', $id)
               ->get();

               
        $user = User::find(auth()->user()->id);

        $dataabsen = Dataabsen::all();
        return view('view_absen', compact('tasemeter', 'jadwal','user', 'dataabsen'));
    }

    public function manajemenabsen()
    {
        $user = User::all();
        return view('absen.index', compact('user'));
    }



    public function izinabsen($id)
    {
        $user = User::where('id',$id)->first();
        return view('absen.izinabsen', compact('user'));
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function izinabsen_update(Request $request, $id)
    {
        $validator =  $request->validate([
            'tanggal'=>'required',
            'status' => 'required',
           
        ]);

        $jamsaatini = date('H:i');
        $pecah_tgl = explode('-',$request->tanggal);
      

        $tgl = $pecah_tgl[2];
        $bulan = $pecah_tgl[1];
        $tahun = $pecah_tgl[0];
       
        $jadwal = Jadwal::where('tanggal', $tgl)->where('bulan', $bulan)->where('tahun', $tahun)->first();

        $data = [
            'jadwal_id' => $jadwal->id,
            'user_id' => $id,
            'status' => $request->status,
            'in' => '-',
            'out' => '-',
            'ket' => $request->ket,

        ];

        Dataabsen::create($data);
        return redirect()->route('manajemenabsen')->with('sukses', 'Izin Berhasil di-Tambahkan');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
