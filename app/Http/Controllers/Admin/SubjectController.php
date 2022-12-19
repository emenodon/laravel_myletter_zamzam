<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubjectController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }

        $post = Subject::orderBy('id', 'ASC');
        //API
        // return response()->json([
        //     'success' => true,
        //     'data' => $post
        // ]);

        $post = $post->paginate(10);
        //BIASA
        return view('dashboard.klasifikasisurat.index', [
            'data' => $post
        ]);
    }

    public function create()
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }
        return view('dashboard.klasifikasisurat.create');
    }

    public function edit($id)
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }
        $data = Subject::where('id', $id)->get();
        return view('dashboard.klasifikasisurat.edit', ['data' => $data]);
    }

    public function store(Request $request)
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }

        $this->validate($request, [
            'subject_name'   => 'required|min:3|max:30',
            'inisial'   => 'required|min:2|max:5',
        ]);

        $data = [
            'subject_name' => $request->subject_name,
            'inisial' => $request->inisial,
        ];

        Subject::create($data);

        // $post = Subject::orderBy('created_at', 'DESC')->get();

        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Dibuat'
        // ],200);
        return redirect()->route('klasifikasisurat.index')->with(['success' => 'Data Berhasil Ditambah!']);
    }

    public function update(Request $request, $id)
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }

        $this->validate($request, [
            'subject_name'   => 'required|min:3|max:30',
            'inisial'   => 'required|min:2|max:5',
        ]);
        
        $data = Subject::where('id', $id)->first();
        $data->update([
            'subject_name' => $request->subject_name,
            'inisial' => $request->inisial,
        ]);

        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Diupdate'
        // ],200);
        return redirect()->route('klasifikasisurat.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        if (Gate::denies('manage-all')) {
            abort(403);
        }
        $data = Subject::where('id', $id)->first()->delete();
        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Data Berhasil Dihapus'
        // ]);
        return redirect()->route('klasifikasisurat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

