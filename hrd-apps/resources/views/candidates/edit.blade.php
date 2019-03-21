@extends('layouts.admin_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lowongan
        <small>Edit Lowongan Pekerjaan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ url('home/candidates') }}"><i class="fa fa-users"></i> Kandidat</a></li>
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
          <form action="{{ url('candidates/'.$candidate->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Nama Kandidat: </label>
              </div>
              <div class="col-md-8">
                <input type="text" name="name" class="form-control" placeholder="Nama Kandidat" value="{{ $candidate->name }}">
                @if ($errors->has('name'))
                  <span class="alert" style="display:block">
                    {{ $errors->first('name') }}
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Lowongan Pekerjaan: </label>
              </div>
              <div class="col-md-8">
                <select class="form-control" name="job_id">
                  @foreach ($jobs as $job)
                    @if ($job->id == $candidate->job->id)
                      <option value="{{ $job->id }}" selected>{{ $job->job_name }}</option>
                    @else
                      <option value="{{ $job->id }}">{{ $job->job_name }}</option>
                    @endif
                  @endforeach
                </select>
                @if ($errors->has('job_id'))
                  <span class="alert" style="display:block">
                    {{ $errors->first('job_id') }}
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Jenis Kelamin: </label>
              </div>
              <div class="col-md-8">
                <select class="form-control" name="gender">
                  <option value="F" {{ $candidate->gender == 'F'? 'selected' : '' }}>Perempuan</option>
                  <option value="M" {{ $candidate->gender == 'M'? 'selected' : '' }}>Laki-laki</option>
                </select>
                @if ($errors->has('gender'))
                  <span class="alert" style="display:block">
                    {{ $errors->first('gender') }}
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Alamat: </label>
              </div>
              <div class="col-md-8">
                <textarea name="address" class="form-control" placeholder="Alamat">{{ $candidate->address }}</textarea>
                @if ($errors->has('address'))
                  <span class="alert" style="display:block">
                    {{ $errors->first('address') }}
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Telepon: </label>
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" name="phone" placeholder="No. Telepon" value="{{ $candidate->phone }}">
                @if ($errors->has('phone'))
                  <span class="alert" style="display:block">
                    {{ $errors->first('phone') }}
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>Email: </label>
              </div>
              <div class="col-md-8">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $candidate->email }}">
                @if ($errors->has('email'))
                  <span class="alert" style="display:block">
                    {{ $errors->first('email') }}
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group has-feedback row">
              <div class="col-md-3">
                <label>CV: </label>
              </div>
              <div class="col-md-8">
                <input type="file" name="cv">
                @if ($errors->has('cv'))
                  <span class="alert" style="display:block">
                    {{ $errors->first('cv') }}
                  </span>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-success pull-right">Edit Lowongan</button>
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
