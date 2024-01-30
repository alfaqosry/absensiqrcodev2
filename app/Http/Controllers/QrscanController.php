<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Qrtoken;
use App\Models\Dataabsen;
use Illuminate\Http\Request;
use App\Events\MonitorqrEvent;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class QrscanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('qrscan.index');
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


        $hari = date ("D");
 
        switch($hari){
            case 'Sun':
                $hari_ini = "Minggu";
            break;
     
            case 'Mon':			
                $hari_ini = "Senin";
            break;
     
            case 'Tue':
                $hari_ini = "Selasa";
            break;
     
            case 'Wed':
                $hari_ini = "Rabu";
            break;
     
            case 'Thu':
                $hari_ini = "Kamis";
            break;
     
            case 'Fri':
                $hari_ini = "Jumat";
            break;
     
            case 'Sat':
                $hari_ini = "Sabtu";
            break;
            
            default:
                $hari_ini = "Tidak di ketahui";		
            break;
        }
     
        $jadwal = Pengaturan::where('hari', $hari_ini)->first();

        

        $tglsaatini = date('d');
        $blnsaatini = date('m');
        $thnsaatini = date('Y');
        $jamsaatini = date('H:i');

        $jammasuk = $jadwal->in;
        $jamkeluar = $jadwal->out;
        $id =  auth()->user()->id;

        $jadwasaatini = Jadwal::where('tanggal', $tglsaatini)
            ->where('bulan', $blnsaatini)
            ->where('tahun', $thnsaatini)->first();
        $user = User::where('id', $id)->first();

        $qr  = str_replace("'", "", $request->qr);
        $token = Qrtoken::first();

        if ($token->token == $qr) {
            if ($user != null) {
                $cekin = Dataabsen::where('jadwal_id', $jadwasaatini->id)
                    ->where('user_id', $user->id)->first();


                if ($jadwasaatini != null) {
                    if ($jadwasaatini->hari != "Sunday") {


                        if (strtotime($jamsaatini) <= strtotime($jammasuk) &&  !$cekin) {



                            $data = [
                                'jadwal_id' => $jadwasaatini->id,
                                'user_id' => $user->id,
                                'status' => "Hadir",
                                'in' => $jamsaatini,
                                'out' => null

                            ];

                            Dataabsen::create($data);
                            $response = [
                                'message' => 'Absen Berhasil',
                                'status' => "berhasil",
                                'nama' => $user->name,
                                'qr' => $qr,
                                'token' => $token->token


                            ];

                            DB::table('qrtokens')
                                ->where('id', 1)
                                ->update(['token' => time()]);
                            broadcast(new MonitorqrEvent('berhasil', 'Absen Berhasil'));

                            return response()->json($response, Response::HTTP_OK);
                        } elseif (strtotime($jamsaatini) >= strtotime($jammasuk) &&  !$cekin) {


                            $data = [
                                'jadwal_id' => $jadwasaatini->id,
                                'user_id' => $user->id,
                                'status' => "Terlambat",
                                'in' => $jamsaatini,
                                'out' => null

                            ];

                            Dataabsen::create($data);
                            $response = [
                                'message' => 'Absen Terlambat',
                                'status' => "berhasil",
                                'nama' => $user->name,
                                'qr' => $qr,
                                'token' => $token->token

                            ];
                            DB::table('qrtokens')
                                ->where('id', 1)
                                ->update(['token' => time()]);
                            broadcast(new MonitorqrEvent('berhasil', 'Absen Terlambat'));

                            return response()->json($response, Response::HTTP_OK);
                        } elseif (strtotime($jamsaatini) >= strtotime($jamkeluar) &&  $cekin) {

                            $absenkeluar = Dataabsen::find($cekin->id);
                            $absenkeluar->out = $jamsaatini;
                            $absenkeluar->save();

                            $response = [
                                'message' => 'Absen Pulang',
                                'status' => "berhasil",
                                'nama' => $user->name,
                                'qr' => $qr,
                                'token' => $token->token

                            ];

                            DB::table('qrtokens')
                                ->where('id', 1)
                                ->update(['token' => time()]);
                            broadcast(new MonitorqrEvent('berhasil', 'Absen Pulang'));

                            return response()->json($response, Response::HTTP_OK);
                        } else {


                            $response = [
                                'message' => 'Anda Sudah Absen',
                                'status' => "gagal",
                                'nama' => $user->name,
                                'qr' => $qr,
                                'token' => $token->token

                            ];

                            DB::table('qrtokens')
                                ->where('id', 1)
                                ->update(['token' => time()]);

                            broadcast(new MonitorqrEvent('gagal', 'Anda Sudah Absen'));

                            return response()->json($response, Response::HTTP_OK);
                        }
                    } else {
                        $response = [
                            'message' => 'Hari ini libur',
                            'status' => "gagal",
                            'nama' => $user->name,
                            'qr' => $qr,
                            'token' => $token->token

                        ];

                        return response()->json($response, Response::HTTP_OK);
                    }
                } else {
                    $response = [
                        'message' => 'Jadwal tidak di temukan',
                        'status' => "gagal",
                        'qr' => $qr,
                        'token' => $token->token

                    ];
                    DB::table('qrtokens')
                        ->where('id', 1)
                        ->update(['token' => time()]);
                    broadcast(new MonitorqrEvent('gagal', 'Jadwal tidak ditemukan'));

                    return response()->json($response, Response::HTTP_OK);
                }
            } else {

                $response = [
                    'message' => 'Pegawai tidak terdaftar',
                    'status' => "gagal",
                    'qr' => $qr,
                    'token' => $token->token

                ];

                DB::table('qrtokens')
                    ->where('id', 1)
                    ->update(['token' => time()]);
                broadcast(new MonitorqrEvent('gagal', 'Pegawai tidak terdaftar'));
                return response()->json($response, Response::HTTP_OK);
            }
        } else {

            $response = [
                'message' => 'Kode QR salah atau mingkin telah kadaluarsa',
                'status' => "gagal",
                'nama' => $user->name,
                'qr' => $qr,
                'token' => $token->token

            ];

            DB::table('qrtokens')
                ->where('id', 1)
                ->update(['token' => time()]);
            broadcast(new MonitorqrEvent('gagal', 'Kode QR salah'));

            return response()->json($response, Response::HTTP_OK);
        }
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
