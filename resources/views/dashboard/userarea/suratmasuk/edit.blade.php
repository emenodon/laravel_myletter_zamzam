@extends('layout.index')

@section('title', 'List SuratMasuk')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Edit Surat Masuk</h1>
  </div>

  <div class="section-body">

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('suratmasukuser.index') }}" class="btn btn-primary">Kembali</a>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md">
                <thead align="center">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Dari Klien</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">Tanggal Terima</th>
                    <th scope="col">Penerima</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody align="center">
                  @php
                  $no = 1;
                  @endphp
                  @forelse ($data as $val)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                      {{ $val->no_surat }}
                    </td>
                    <td>{{ $val->subject->subject_name }}</td>
                    <td>{{ $val->dari_klien }}</td>
                    <td>{{ $val->tgl_surat }}</td>
                    <td>{{ $val->tgl_terima }}</td>
                    <td>{{ $val->penerima }}</td>
                    <td>{{ $val->deskripsi }}</td>
                    <td>
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('suratmasukuser.destroy', $val->id) }}" method="POST">
                        <a href="{{ route('suratmasukuser.edit', $val->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="9" class="text-center">
                      tidak ada data
                    </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <ul class="pagination mb-0 pt-5">
              {!! $data->links('components.pagination') !!}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection