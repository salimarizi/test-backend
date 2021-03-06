@extends('layouts.admin_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lowongan
        <small>Tambah Lowongan Pekerjaan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ url('home/jobs') }}"><i class="fa fa-archive"></i> Lowongan</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Lowongan</h3>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form action="{{ url('jobs') }}" method="post">
            @csrf
            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Nama Lowongan: </label>
              </div>
              <div class="col-md-8">
                <input type="text" name="job_name" class="form-control" placeholder="Nama Lowongan">
                @if ($errors->has('job_name'))
                  <span class="alert" style="display:block">
                    {{ $errors->first('job_name') }}
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Deskripsi Lowongan: </label>
              </div>
              <div class="col-md-8">
                <textarea name="job_desc" class="form-control" placeholder="Deskripsi Lowongan"></textarea>
                @if ($errors->has('job_desc'))
                  <span class="alert" style="display:block">
                    {{ $errors->first('job_desc') }}
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Skill: </label>
              </div>
              <div class="col-md-8">
                <input type="text" name="skills" class="form-control" placeholder="Skill yang dibutuhkan">
                @if ($errors->has('skills'))
                  <span class="alert" style="display:block">
                    {{ $errors->first('skills') }}
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary pull-right">Simpan Lowongan</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
