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
            <h3 class="card-title ">Create Service </h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{route('services.index.store')}}" enctype="multipart/form-data">
            @csrf

            @method('put')


            <div class="card-body">
              <div class="form-group">
                <label for="name">Service name</label>
                <input type="text" name="name" value="{{old('service->name')}}" class="form-control" id="name" placeholder="Enter name">
              </div>

              <div class="form-group">
                <label for="slug">Service Slug</label>
                <input type="text" name="slug" value="" class="form-control" id="slug" placeholder="Enter slug">
              </div>

              <div class="form-group">
                <label for="service_detail">Service Detail</label>
                <input type="text" name="service_detail" value="" class="form-control" id="service_detail" placeholder="Enter detail">
              </div>

              <div class="form-group">
                <label for="service_header">Service Header</label>
                <input type="text" name="service_header" value="" class="form-control" id="service_header" placeholder="Enter header">
              </div>

              <div class="form-group">
                <label for="exampleInputFile">Choose banner image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="service_image" value="" class="form-control" id="exampleInputFile" placeholder="Enter image">
                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text"> Upload</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Choose icon</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="service_icon" value="" class="form-control" id="exampleInputFile" placeholder="Enter image">
                      <label class="custom-file-label" for="exampleInputFile">Choose icon</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text"> Upload</span>
                    </div>
                  </div>



                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title">
                        Service description
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <textarea id="summernote" name="service_desc">

              </textarea>
                    </div>

                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-switch">

                      <input {{ old('status') == 1 ? "checked" : "" }} value="1" name="status" type="checkbox" class="custom-control-input" type="checkbox" id="customSwitch1">
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