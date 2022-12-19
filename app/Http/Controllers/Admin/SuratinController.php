<?php

namespace App\Http\Controllers\Admin;

use App\Models\Suratin;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SuratinController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    // public function test() {
    //     $users=DB::select('select *from DEPT');
    //     // var_dump($users);
    // }
    public function index(Request $request)
    {

        $post = Suratin::with('subject')->orderBy('id', 'ASC');
        //API
        // return response()->json([
        //     'success' => true,
        //     'data' => $post
        // ]);

        $post = $post->paginate(10);
        //BIASA
        return view('dashboard.suratmasuk.index', [
            'data' => $post
        ]);
    }

    public function show()
    {
        $post = Suratin::with('subject')->orderBy('id', 'DESC');
        //API
        // return response()->json([
        //     'success' => true,
        //     'data' => $post
        // ]);

        $post = $post->paginate(10);
        //BIASA
        return view('dashboard.suratmasuk.edit', [
            'data' => $post
        ]);
    }

    public function create()
    {
        return view('dashboard.suratmasuk.create',['data' => Subject::all()]);
    }

    public function edit($id)
    {
        $data = Suratin::where('id', $id)->get();
        return view('dashboard.suratmasuk.update', ['data' => $data, 'subj' => Subject::all()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor'     => 'required|min:2|max:4',
            'subject_id'   => 'required',
            'dari_klien'   => 'required|min:3|max:30',
            'tgl_surat'   => 'required',
            'tgl_terima'   => 'required',
            'penerima'   => 'required|min:3|max:20',
            'deskripsi'   => 'required|min:3|max:255',
        ]);

        $data = [
            'no_surat' => $request->nomor,
            'subject_id' => $request->subject_id,
            'dari_klien' => $request->dari_klien,
            'tgl_surat' => $request->tgl_surat,
            'tgl_terima' => $request->tgl_terima,
            'penerima' => $request->penerima,
            'deskripsi' => $request->deskripsi,
        ];

        Suratin::create($data);

        // $post = Suratin::orderBy('created_at', 'DESC')->get();

        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Dibuat'
        // ],200);
        return redirect()->route('suratmasuk.index')->with(['success' => 'Data Berhasil Ditambah!']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'subject_id'   => 'required',
            'dari_klien'   => 'required|min:3|max:30',
            'tgl_surat'   => 'required',
            'tgl_terima'   => 'required',
            'penerima'   => 'required|min:3|max:20',
            'deskripsi'   => 'required|min:3|max:255',
        ]);

        $data = Suratin::where('id', $id)->first();
        $data->update([
            'subject_id' => $request->subject_id,
            'dari_klien' => $request->dari_klien,
            'tgl_surat' => $request->tgl_surat,
            'tgl_terima' => $request->tgl_terima,
            'penerima' => $request->penerima,
            'deskripsi' => $request->deskripsi,
        ]);

        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Diupdate'
        // ],200);
        return redirect()->route('suratmasuk.show','all')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data = Suratin::where('id', $id)->first()->delete();
        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Dihapus'
        // ]);
        return redirect()->route('suratmasuk.show','all')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
