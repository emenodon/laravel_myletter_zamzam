@extends('layout.index')

@section('title', 'List SuratKeluar')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Surat Keluar</h1>
  </div>

  <div class="section-body">

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="col-12 col-md-12 col-lg-12">
              <a  href="{{route('suratkeluar.create')}}" class="btn btn-primary">Tambah Surat </a> &nbsp
              <a  href="{{route('suratkeluar.show','tot')}}" class="btn btn-warning">Edit Surat </a>

              <form class="float-sm-right">
                <div class="input-group">
                  <input type="text" id="myInput" class="mr-2 form-control" placeholder="Search">
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
                    <th scope="col">Nomor</th>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Pembuat</th>
                  </tr>
                </thead>
                <tbody id="myData" align="center">
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
  </section>
  @endsection