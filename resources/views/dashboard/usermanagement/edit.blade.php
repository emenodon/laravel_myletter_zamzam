@extends('layout.index')

@section('title', 'Edit User')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit User</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    @forelse ($data as $val)
                    <form action="{{ route('usermanagement.update', $val->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan Username..." value="{{ old('name', $val->name) }}">
                                <!-- error message untuk name -->
                                @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan Password..." value="{{ old('password', $val->password) }}">
                                <!-- error message untuk password -->
                                @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namalengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap', $val->nama_lengkap) }}">
                                <!-- error message untuk nama_lengkap -->
                                @error('nama_lengkap')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inisial" class="col-sm-3 col-form-label">Inisial</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('inisial') is-invalid @enderror" name="inisial" value="{{ old('inisial', $val->inisial) }}">
                                <!-- error message untuk inisial -->
                                @error('inisial')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $val->email) }}">
                                <!-- error message untuk email -->
                                @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="notelp" class="col-sm-3 col-form-label">No.Telp/HP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', $val->no_hp) }}">
                                <!-- error message untuk no_hp -->
                                @error('no_hp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                                <select type="text" class="form-control selectric @error('jabatan_id') is-invalid @enderror" aria-label="- Piih Jabatan -" name="jabatan_id" value="{{ old('jabatan', $val->jabatan_id) }}" required>
                                    @if($val->jabatan_id)
                                    <option value="{{$val->jabatan_id}}" selected>{{$val->jabatan->jabatan_name}}</option>
                                    <option value="">---- Pilih Jabatan----</option>
                                    @forelse ($jaba as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->jabatan_name }}</option>
                                    @empty
                                    <option value="3">Tidak Ada Jabatan</option>
                                    @endforelse
                                    @else
                                    @endif
                                </select>
                                <!-- error message untuk jabatan_id -->
                                @error('jabatan_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-3 col-form-label">Blokir</label>
                            <div class="col-sm-9">
                                <select type="text" class="form-control @error('status_blokir') is-invalid @enderror" aria-label="- Piih Jabatan -" name="status_blokir" value="{{ old('status_blokir', $val->status_blokir) }}" required>
                                    <option>-- Piih --</option>
                                    {{-- <option value="1">Yes</option>
                                    <option value="0">No</option> --}}
                                    @if($val->status_blokir == 1)
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                    @else
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                    @endif
                                </select>
                                <!-- error message untuk status_blokir -->
                                @error('status_blokir')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('usermanagement.index') }}" class="btn btn-danger">Batal</a>
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