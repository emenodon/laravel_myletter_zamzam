@extends('layout.index')

@section('title', 'Edit KlasifikasiSurat')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update Subject Surat</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    @forelse ($data as $val)
                    <form action="{{ route('klasifikasisurat.update', $val->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="namasubject" class="col-sm-3 col-form-label">Nama Subject</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('subject_name') is-invalid @enderror" name="subject_name" value="{{ old('subject_name', $val->subject_name) }}">
                                <!-- error message untuk inisial -->
                                @error('subject_name')
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
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('klasifikasisurat.index') }}" class="btn btn-danger">Batal</a>
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