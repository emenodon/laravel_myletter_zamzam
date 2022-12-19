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
                    <form action="{{ route('suratmasuk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nomorSurat" class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('nomor') is-invalid @enderror" value="{{ old('nomor') }}" name="nomor" placeholder="Nomor Surat">
                                <!-- error message untuk nomor -->
                                @error('nomor')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                            <div class="col-sm-9">
                                <select type="text" class="form-control selectric @error('subject_id') is-invalid @enderror" value="{{ old('subject_id') }}" aria-label="- Piih Subject Surat -" name="subject_id" placeholder="Perihal">
                                    <option value="" selected>----Pilih----</option>
                                    @forelse ($data as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->subject_name }}</option>
                                    @empty
                                    <option value="">Tidak Ada Subject</option>
                                    @endforelse
                                </select>
                                <!-- error message untuk subject_id -->
                                @error('subject_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dariKlien" class="col-sm-3 col-form-label">Dari Klien</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('dari_klien') is-invalid @enderror" value="{{ old('dari_klien') }}" name="dari_klien" placeholder="Dari Klien">
                                <!-- error message untuk dari_klien -->
                                @error('dari_klien')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggalSurat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tgl_surat') is-invalid @enderror" value="{{ old('tgl_surat') }}" name="tgl_surat" placeholder="Tanggal Surat">
                                <!-- error message untuk tgl_surat -->
                                @error('tgl_surat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggalTerima" class="col-sm-3 col-form-label">Tanggal Terima</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tgl_terima') is-invalid @enderror" value="{{ old('tgl_terima') }}" name="tgl_terima" placeholder="Tanggal Terima">
                                <!-- error message untuk tgl_terima -->
                                @error('tgl_terima')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penerima" class="col-sm-3 col-form-label">Penerima</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('penerima') is-invalid @enderror" name="penerima" value="{{ Auth::user()->nama_lengkap }}" placeholder="Penerima">
                                <!-- error message untuk penerima -->
                                @error('penerima')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
                                <!-- error message untuk deskripsi -->
                                @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        {{-- <button type="submit" class="btn btn-danger">Batal</button> --}}
                        <a href="{{ route('suratmasuk.index') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection