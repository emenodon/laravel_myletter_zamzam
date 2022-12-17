@extends('layout.index')

@section('title', 'List SuratMasuk')

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Surat Masuk</h1>
  </div>

  <div class="section-body">

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="col-12 col-md-12 col-lg-12">
              <a  href="{{ route('suratmasuk.create') }}" class="btn btn-primary">Tambah Surat </a> &nbsp
              <a  href="{{route('suratmasuk.show','all')}}" class="btn btn-warning">Edit Surat </a>

              <form class="float-sm-right">
                <div class="input-group">
                  <input type="text" id="myInput" class=" mr-2 form-control" placeholder="Search">
                  <div class="input-group-btn">
                    {{-- <button class="btn btn-dark"><i class="fas fa-search"></i></button> --}}
                    <input type="button" class="btn btn-success" id="btnExport" value="Print PDF" />
                  </div>

                </div>
              </form>
            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table id="tabledata" class="table table-bordered table-md">
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
                  </tr>
                </thead>
                <tbody id="myData" align="center">
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
                  </tr>
                  @empty
                  <tr>
                    <td colspan="8" class="text-center">
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