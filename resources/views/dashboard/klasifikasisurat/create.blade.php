@extends('layout.index')

@section('title', 'Tambah Subject')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Subject</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('klasifikasisurat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="namasubject" class="col-sm-3 col-form-label">Nama Subject</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="subject_name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inisial" class="col-sm-3 col-form-label">Inisial</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inisial" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('klasifikasisurat.index') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection