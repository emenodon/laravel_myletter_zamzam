@extends('layout.index')

@section('title', 'Dashboard')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="row">
    @can('manage-all')
    <a href="{{ route('suratmasuk.index') }}" class="col-lg-3 col-md-6 col-sm-6 col-12">

      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-envelope"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Surat Masuk</h4>
          </div>
          <div class="card-body">
            {{ $datain }}
          </div>
        </div>
      </div>
    </a>
    @endif
    @can('manage-separate')
    <a href="{{ route('suratmasukuser.index') }}" class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-envelope"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Surat Masuk</h4>
          </div>
          <div class="card-body">
            {{ $datain }}
          </div>
        </div>
      </div>
    </a>
    @endif
    <a href="{{ route('suratkeluar.index') }}" class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-envelope"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Surat Keluar</h4>
          </div>
          <div class="card-body">
            {{ $dataout }}
          </div>
        </div>
      </div>
    </a>
  </div>
</section>
@endsection