<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dataabsen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tglsaatini = date('d');
        $blnsaatini = date('m');
        $thnsaatini = date('Y');
        $jadwal = Jadwal::where('tanggal', $tglsaatini)
            ->where('bulan', $blnsaatini)
            ->where('tahun', $thnsaatini)->first();
            if (isset( $jadwal)) {
                $absen = Dataabsen::where('jadwal_id', $jadwal->id)->where('user_id', auth()->user()->id)->first();
            }else{
                $absen = null;
            }

          
        return view('dashboard.index', compact('absen'));
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
