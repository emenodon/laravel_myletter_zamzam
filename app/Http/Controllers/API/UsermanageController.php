<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsermanageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }
        $post = User::with('jabatan')->orderBy('id', 'ASC');
        //API
        // return response()->json([
        //     'success' => true,
        //     'data' => $post
        // ]);

        $post = $post->paginate(10);
        //BIASA
        return view('dashboard.usermanagement.index', [
            'data' => $post
        ]);
    }

    public function create()
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }
        return view('dashboard.usermanagement.create',['data' => Jabatan::all()]);
    }

    public function edit($id)
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }
        $data = User::with('jabatan')->where('id', $id)->get();
        return view('dashboard.usermanagement.edit', ['data' => $data, 'jaba' => Jabatan::all()]);
    }

    public function store(Request $request)
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }
        $data = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'inisial' => $request->inisial,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status_blokir' => $request->status_blokir,
            'jabatan_id' => $request->jabatan_id,
        ];

        User::create($data);

        // $post = User::orderBy('created_at', 'DESC')->get();

        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Dibuat'
        // ],200);
        return redirect()->route('usermanagement.index')->with(['success' => 'Data Berhasil Ditambah!']);
    }

    public function update(Request $request, $id)
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }
        $data = User::where('id', $id)->first();
        $data->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'inisial' => $request->inisial,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status_blokir' => $request->status_blokir,
            'jabatan_id' => $request->jabatan_id,
        ]);

        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Diupdate'
        // ],200);
        return redirect()->route('usermanagement.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }
        $data = User::where('id', $id)->first()->delete();
        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Dihapus'
        // ]);
        return redirect()->route('usermanagement.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
