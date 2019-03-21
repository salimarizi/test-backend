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
        Lowongan
        <small>Data Lowongan Pekerjaan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ url('jobs') }}"><i class="fa fa-dashboard"></i> Lowongan</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Lowongan</h3>

          <div class="box-tools pull-right">
            <form action="{{ url('jobs/'.$job->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger">Hapus Lowongan</button>
            </form>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group has-feedback row">
            <div class="col-md-3">
              <label>Nama Lowongan: </label>
            </div>
            <div class="col-md-8">
              {{ $job->job_name }}
            </div>
          </div>

          <div class="form-group has-feedback row">
            <div class="col-md-3">
              <label>Deskripsi Lowongan: </label>
            </div>
            <div class="col-md-8">
              {{ $job->job_desc }}
            </div>
          </div>

          <div class="form-group has-feedback row">
            <div class="col-md-3">
              <label>Skill: </label>
            </div>
            <div class="col-md-8">
              {{ $job->skills }}
            </div>
          </div>

          <div class="form-group has-feedback row">
            <div class="col-md-3">
              <label>Status: </label>
            </div>
            <div class="col-md-8">
              {{ $job->status }}
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
