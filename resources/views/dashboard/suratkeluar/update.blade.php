@extends('layout.index')

@section('title', 'Edit SuratKeluar')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Surat Keluar</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    @forelse ($data as $val)
                    <form action="{{ route('suratkeluar.update', $val->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="nomor" class="col-sm-3 col-form-label">Nomor</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nomor" required placeholder="Nomor Surat" value="{{ old('nomor', $val->nomor) }}" disabled>
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
                            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Deskripsi">{{ old('keterangan', $val->keterangan) }}</textarea>
                                <!-- error message untuk keterangan -->
                                @error('keterangan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tujuan" class="col-sm-3 col-form-label">Tujuan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" placeholder="Tujuan" value="{{ old('tujuan', $val->tujuan) }}">
                                <!-- error message untuk tujuan -->
                                @error('tujuan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl" value="{{ old('tgl', $val->tgl) }}">
                                <!-- error message untuk tgl -->
                                @error('tgl')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pembuat" class="col-sm-3 col-form-label">Pembuat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('pembuat') is-invalid @enderror" name="pembuat" placeholder="Pembuat" value="{{ old('pembuat', $val->pembuat) }}">
                                <!-- error message untuk pembuat -->
                                @error('pembuat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('suratkeluar.show','all') }}" class="btn btn-danger">Batal</a>
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