@extends('layout.index')

@section('title', 'List User')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a  href="{{route('usermanagement.create')}}" class="btn btn-primary">Tambah User </a> 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered table-md">
                            <thead align="center">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Inisial</th>
                                <th scope="col">Email</th>
                                <th scope="col">No.Telp/HP</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Blokir</th>
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
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->nama_lengkap }}</td>
                            <td>{{ $val->inisial }}</td>
                            <td>{{ $val->email }}</td>
                            <td>{{ $val->no_hp }}</td>
                            <td>{{ $val->jabatan->jabatan_name }}</td>
                            <td>{{ $val->status_blokir }}</td>
                            <td>
                              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('usermanagement.destroy', $val->id) }}" method="POST">
                                <a href="{{ route('usermanagement.edit', $val->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
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