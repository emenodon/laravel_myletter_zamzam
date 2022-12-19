<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Suratin;
use App\Models\Subject;
use Carbon\Carbon;

class SuratinuserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Suratin::with('subject')->orderBy('id', 'ASC');
        //API
        // return response()->json([
        //     'success' => true,
        //     'data' => $post
        // ]);

        $post = $post->paginate(10);
        //BIASA
        return view('dashboard.userarea.suratmasuk.index', [
            'data' => $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.userarea.suratmasuk.create',['data' => Subject::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_surat'     => 'required|min:2|max:4',
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
        return redirect()->route('suratmasukuser.index')->with(['success' => 'Data Berhasil Ditambah!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Suratin::with('subject')->orderBy('id', 'DESC')->where('penerima',$id);
        //API
        // return response()->json([
        //     'success' => true,
        //     'data' => $post
        // ]);

        $post = $post->paginate(10);
        //BIASA
        return view('dashboard.userarea.suratmasuk.edit', [
            'data' => $post
        ]);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Suratin::where('id', $id)->get();
        return view('dashboard.userarea.suratmasuk.update', ['data' => $data, 'subj' => Subject::all()]);
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
        return redirect()->route('suratmasukuser.show', Auth::user()->nama_lengkap)->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Suratin::where('id', $id)->first()->delete();
        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Dihapus'
        // ]);
        return redirect()->route('suratmasukuser.show',Auth::user()->nama_lengkap)->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
