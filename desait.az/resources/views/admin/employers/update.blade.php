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
            <h3 class="card-title ">Employer Edit</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{route('employers.index.update',$employer->id)}} " enctype="multipart/form-data">
            @csrf


            <div class="card-body">
              <div class="form-group">
                <label for="name">Portfolio box Category</label>
                <input type="text" name="name" value="{{old('employers',$employer->name)}}" class="form-control" id="name" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <label for="duty">Title</label>
                <input type="desc" name="duty" value="{{$employer->duty}}" class="form-control" id="duty" placeholder="Enter duty">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" value="{{$employer->image}}" class="form-control" id="exampleInputFile" placeholder="Enter image">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text"> Upload</span>
                  </div>
                </div>


                <div class="form-group">
                  <div class="custom-control custom-switch">

                    <input {{ old('status', $employer->status) == 1 ? "checked" : "" }} value="1" name="status" type="checkbox" class="custom-control-input" type="checkbox" id="customSwitch1">
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