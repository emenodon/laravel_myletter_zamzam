@extends('layout.index')

@section('title', 'Tambah SuratMasuk')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Surat Masuk</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('suratmasukuser.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nomorSurat" class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nomor" required placeholder="Nomor Surat">
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
                            <label for="dariKlien" class="col-sm-3 col-form-label">Dari Klien</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="dari_klien" required placeholder="Dari Klien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggalSurat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl_surat" required placeholder="Tanggal Surat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggalTerima" class="col-sm-3 col-form-label">Tanggal Terima</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl_terima" required placeholder="Tanggal Terima">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penerima" class="col-sm-3 col-form-label">Penerima</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="penerima" value="{{ Auth::user()->nama_lengkap }}" required placeholder="Penerima">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="deskripsi" required placeholder="Deskripsi"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        {{-- <button type="submit" class="btn btn-danger">Batal</button> --}}
                        <a href="{{ route('suratmasukuser.index') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection