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
                                <input type="text" class="form-control" name="name" placeholder="Masukan Username..." required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="password" placeholder="Masukan Password..." required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namalengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_lengkap" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inisial" class="col-sm-3 col-form-label">Inisial</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inisial" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="notelp" class="col-sm-3 col-form-label">No.Telp/HP</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="no_hp">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                                <select type="text" class="form-control selectric" aria-label="- Piih Jabatan -" name="jabatan_id" required>
                                    <option value="" selected>---- Pilih Jabatan----</option>
                                    @forelse ($data as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->jabatan_name }}</option>
                                    @empty
                                    <option value="">Tidak Ada Subject</option>
                                    @endforelse
                                </select>
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