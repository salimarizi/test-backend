@extends('layouts.admin_layout')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{!! asset('admin_template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kandidat
        <small>Data Kandidat Pekerjaan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ url('candidates') }}"><i class="fa fa-dashboard"></i> Kandidat</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Kandidat</h3>

          <div class="box-tools pull-right">
            <form action="{{ url('candidates/'.$candidate->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger">Hapus kandidat</button>
            </form>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Nama Kandidat: </label>
              </div>
              <div class="col-md-8">
                {{ $candidate->name }}
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Lowongan Pekerjaan: </label>
              </div>
              <div class="col-md-8">
                {{ $candidate->job->job_name }}
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Jenis Kelamin: </label>
              </div>
              <div class="col-md-8">
                {{ $candidate->gender == 'F' ? 'Perempuan' : 'Laki-laki' }}
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Alamat: </label>
              </div>
              <div class="col-md-8">
                {{ $candidate->address }}
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Telepon: </label>
              </div>
              <div class="col-md-8">
                {{ $candidate->phone }}
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Email: </label>
              </div>
              <div class="col-md-8">
                {{ $candidate->email }}
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>CV: </label>
              </div>
              <div class="col-md-8">
                <a href="{{ url('storage/cv/'.$candidate->cv) }}" class="btn btn-success"><i class="fa fa-download"></i> Download CV</a>
              </div>
            </div>
        </div>
        <!-- /.box-body -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
  <!-- DataTables -->
  <script src="{{asset('admin_template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin_template/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection
