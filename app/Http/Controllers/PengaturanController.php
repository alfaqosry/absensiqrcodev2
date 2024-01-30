<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\User;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaturan = Pengaturan::get();
        return view('pengaturan.index' ,compact('pengaturan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('pengaturan.createpengaturan'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  $request->validate([
            'hari'=>'required',
            'in' => 'required',
            'out' => 'required',
           
           
        ]);
       
       Pengaturan::create($request->all());

        return redirect()->route('pengaturan')->with('sukses', 'Pengaturan Berhasil di-Tambahkan');
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
        $pengaturan = pengaturan::find($id);
        return view('pengaturan.edit', compact('pengaturan'));
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
        
        $pengaturan = Pengaturan::find($id);
        $pengaturan->hari = $pengaturan->hari;
        $pengaturan->in = $request->in;
        $pengaturan->out = $request->out;
   

        $pengaturan->save();

        return redirect()->route('pengaturan')->with('sukses', 'Data Berhasil di-Update');

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
