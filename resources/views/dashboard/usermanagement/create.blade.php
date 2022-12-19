@extends('layout.index')

@section('title', 'Tambah User')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah User</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('usermanagement.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukan Username...">
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
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Masukan Password...">
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
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" name="nama_lengkap">
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
                                <input type="text" class="form-control @error('inisial') is-invalid @enderror" value="{{ old('inisial') }}" name="inisial">
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
                                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email">
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
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" name="no_hp">
                                <!-- error message untuk title -->
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
                                <select type="text" class="form-control selectric @error('jabatan_id') is-invalid @enderror" value="{{ old('jabatan_id') }}" aria-label="- Piih Jabatan -" name="jabatan_id">
                                    <option value="" selected>---- Pilih Jabatan----</option>
                                    @forelse ($data as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->jabatan_name }}</option>
                                    @empty
                                    <option value="">Tidak Ada Subject</option>
                                    @endforelse
                                </select>
                                <!-- error message untuk jabatan_id -->
                                @error('jabatan_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="status_blokir" value="no">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('usermanagement.index') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection