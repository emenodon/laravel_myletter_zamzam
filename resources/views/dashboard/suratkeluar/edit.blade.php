@extends('layout.index')

@section('title', 'List SuratKeluar')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Edit Surat Keluar</h1>
  </div>

  <div class="section-body">

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            {{-- <button type="submit" class="btn btn-primary">Kembali</button>  --}}
            <a href="{{ route('suratkeluar.index') }}" class="btn btn-primary">Kembali</a>

          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md">
                <thead align="center">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomor</th>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Pembuat</th>
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
                    <td>{{ $val->nomor }}</td>
                    <td>{{ $val->nomor_surat }}</td>
                    <td>{{ $val->subject->subject_name }}</td>
                    <td>{{ $val->keterangan }}</td>
                    <td>{{ $val->tujuan }}</td>
                    <td>{{ $val->tgl }}</td>
                    <td>{{ $val->pembuat }}</td>
                    <td>
                      <a href="{{ route('suratkeluar.edit', $val->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" class="text-center">
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
  </div>
</section>
@endsection