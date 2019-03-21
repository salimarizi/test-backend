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
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Lowongan</h3>

          <div class="box-tools pull-right">
            <a href="{{ url('jobs/create') }}" class="btn btn-primary">Tambah Lowongan</a>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-responsive table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Lowongan</th>
                <th>Skill</th>
                <th>Status</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php($salim = 1)
              @foreach ($jobs as $job)
                <tr>
                  <td>{{ $salim++ }}</td>
                  <td>{{ $job->job_name }}</td>
                  <td>{{ $job->skills }}</td>
                  <td>{{ $job->status }}</td>
                  <td>
                    <a href="{{ url('jobs/'.$job->id.'/edit') }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                  </td>
                  <td>
                    <a href="{{ url('jobs/'.$job->id) }}" class="btn btn-primary"><i class="fa fa-chevron-right"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
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
