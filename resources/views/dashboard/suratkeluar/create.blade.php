@extends('layout.index')

@section('title', 'Tambah SuratKeluar')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Surat Keluar</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('suratkeluar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nomor" class="col-sm-3 col-form-label">Nomor</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="nomor" required placeholder="Nomor" value="{{ $lastid+1 }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                            <div class="col-sm-9">
                                <select type="text" class="form-control selectric" aria-label="- Piih Subject Surat -" name="subject_id" required placeholder="Perihal">
                                    <option value="" selected>----Pilih----</option>
                                    @forelse ($data as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->subject_name }}</option>
                                    @empty
                                    <option value="">Tidak Ada Subject</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="keterangan" required placeholder="Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tujuan" class="col-sm-3 col-form-label">Tujuan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tujuan" required placeholder="Tujuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pembuat" class="col-sm-3 col-form-label">Pembuat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pembuat" value="{{ Auth::user()->nama_lengkap }}" required placeholder="Pembuat">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('suratkeluar.index') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection