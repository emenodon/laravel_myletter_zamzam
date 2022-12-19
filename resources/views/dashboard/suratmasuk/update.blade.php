@extends('layout.index')

@section('title', 'Edit SuratMasuk')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Surat Masuk</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    @forelse ($data as $val)
                    <form action="{{ route('suratmasuk.update', $val->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="nomorSurat" class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat" value="{{ old('no_surat', $val->no_surat) }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                            <div class="col-sm-9">
                                <select type="text" class="form-control selectric @error('subject_id') is-invalid @enderror" aria-label="- Piih Subject Surat -" value="{{ old('subject_id', $val->subject_id) }}" name="subject_id" placeholder="Perihal">
                                    @if($val->subject_id)
                                    <option value="{{$val->subject_id}}" selected>{{$val->subject->subject_name}}</option>
                                    <option value="">---- Pilih Subject----</option>
                                    @forelse ($subj as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->subject_name }}</option>
                                    @empty
                                    <option value="3">Tidak Ada Subject</option>
                                    @endforelse
                                    @else
                                    @endif
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
                                <input type="text" class="form-control @error('dari_klien') is-invalid @enderror" name="dari_klien" placeholder="Dari Klien" value="{{ old('dari_klien', $val->dari_klien) }}">
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
                                <input type="date" class="form-control @error('tgl_surat') is-invalid @enderror" name="tgl_surat" placeholder="Tanggal Surat" value="{{ old('tgl_surat', $val->tgl_surat) }}">
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
                                <input type="date" class="form-control @error('tgl_terima') is-invalid @enderror" name="tgl_terima" placeholder="Tanggal Terima" value="{{ old('tgl_terima', $val->tgl_terima) }}">
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
                                <input type="text" class="form-control @error('penerima') is-invalid @enderror" name="penerima" placeholder="Penerima" value="{{ old('penerima', $val->penerima) }}">
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
                                <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Deskripsi" required>{{ old('deskripsi', $val->deskripsi) }}</textarea>
                                <!-- error message untuk deskripsi -->
                                @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        {{-- <button type="submit" class="btn btn-danger">Batal</button> --}}
                        <a href="{{ route('suratmasuk.show','all') }}" class="btn btn-danger">Batal</a>
                    </form>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                          tidak ada data
                      </td>
                  </tr>
                  @endforelse
              </div>
          </div>
      </div>
  </div>
</section>
@endsection