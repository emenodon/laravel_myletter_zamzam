<?php

namespace App\Http\Controllers\API;

use App\Models\Suratout;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SuratoutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $post = Suratout::with('subject')->orderBy('id', 'ASC');
        //API
        // return response()->json([
        //     'success' => true,
        //     'data' => $post
        // ]);

        $post = $post->paginate(10);
        //BIASA
        return view('dashboard.suratkeluar.index', [
            'data' => $post
        ]);
    }

    public function show()
    {
        $post = Suratout::with('subject')->orderBy('id', 'DESC');
        //API
        // return response()->json([
        //     'success' => true,
        //     'data' => $post
        // ]);

        $post = $post->paginate(10);
        //BIASA
        return view('dashboard.suratkeluar.edit', [
            'data' => $post
        ]);
    }

    public function create()
    {
        $lastid = Suratout::latest()->first()?->id;
        return view('dashboard.suratkeluar.create',['data' => Subject::all(),'lastid'=>$lastid]);
    }

    public function edit($id)
    {
        $data = Suratout::where('id', $id)->get();
        return view('dashboard.suratkeluar.update', ['data' => $data, 'subj' => Subject::all()]);
    }

    public function store(Request $request)
    {
        function getRomawi($bln){
            switch ($bln){
                case 1: 
                return "I";
                break;
                case 2:
                return "II";
                break;
                case 3:
                return "III";
                break;
                case 4:
                return "IV";
                break;
                case 5:
                return "V";
                break;
                case 6:
                return "VI";
                break;
                case 7:
                return "VII";
                break;
                case 8:
                return "VIII";
                break;
                case 9:
                return "IX";
                break;
                case 10:
                return "X";
                break;
                case 11:
                return "XI";
                break;
                case 12:
                return "XII";
                break;
            }
        }
        $subname = Subject::where('id', $request->subject_id)->get();
        $sub = $subname[0]->inisial;
        $d = new Carbon( $request->tgl );
        $nom = sprintf("%03d",$request->nomor);
        $toromawi = getRomawi($d->month);

        $data = [
            'nomor' => $nom,
            'nomor_surat' => $nom.'/MIB/'.$sub.'/'.$toromawi.'/'.$d->year,
            'subject_id' => $request->subject_id,
            'keterangan' => $request->keterangan,
            'tujuan' => $request->tujuan,
            'tgl' => $request->tgl,
            'pembuat' => $request->pembuat,
        ];

        Suratout::create($data);

        // $post = Suratout::orderBy('created_at', 'DESC')->get();

        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Dibuat'
        // ],200);
        return redirect()->route('suratkeluar.index')->with(['success' => 'Data Berhasil Ditambah!']);
    }

    public function update(Request $request, $id)
    {
        $data = Suratout::where('id', $id)->first();
        $subname = Subject::where('id', $request->subject_id)->get();
        $sub = $subname[0]->inisial;
        $data->update([
            'subject_id' => $request->subject_id,
            'keterangan' => $request->keterangan,
            'tujuan' => $request->tujuan,
            'tgl' => $request->tgl,
            'pembuat' => $request->pembuat,
        ]);

        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Diupdate'
        // ],200);
        return redirect()->route('suratkeluar.show','all')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data = Suratout::where('id', $id)->first()->delete();
        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Dihapus'
        // ]);
        return redirect()->route('suratkeluar.show','all')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
