@extends('admin.layouts.master')


@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>General Form</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">General Form</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-8">



        <x-alert-message />


        @if($errors->any())

        @foreach($errors->all() as $error)

        <li class="alert alert-danger">{{$error}}</li>

        @endforeach

        @endif



        <!-- general form elements -->
        <div class="card card-primary ">
          <div class="card-header">
            <h3 class="card-title ">Work Process Edit</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{route('workprocess.index.update',$process->id)}} " enctype="multipart/form-data">
            @csrf


            <div class="card-body">
              <div class="form-group">
                <label for="proccess_title">Services box name</label>
                <input type="text" name="proccess_title" value="{{old('workprocess',$process->proccess_title)}}" class="form-control" id="proccess_title" placeholder="Enter nanme">
              </div>
              <div class="form-group">
                <label for="proccess_desc">Description</label>
                <input type="desc" name="proccess_desc" value="{{old('workprocess',$process->proccess_desc)}}" class="form-control" id="proccess_desc" placeholder="Enter desc">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="proccess_icon" value="{{$process->proccess_icon}}" class="form-control" id="exampleInputFile" placeholder="Enter icon">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text"> Upload</span>
                  </div>
                </div>


                <div class="form-group">
                  <div class="custom-control custom-switch">

                    <input {{ old('status', $process->status) == 1 ? "checked" : "" }} value="1" name="status" type="checkbox" class="custom-control-input" type="checkbox" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">Status</label>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


@endsection