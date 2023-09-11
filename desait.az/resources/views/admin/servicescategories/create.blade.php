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
            <h3 class="card-title ">Create Services Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{route('servicescategories.index.store')}}" enctype="multipart/form-data">
            @csrf


            <div class="card-body">
              <div class="form-group">
                <label for="name"> Portfolio Box Category</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter Box Name">
              </div>
              <div class="form-group">
                <label for="slug">Category slug</label>
                <input type="text" name="slug" value="{{old('slug')}}" class="form-control" id="slug" placeholder="Enter Slug">
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleSelectBorder">Parent Category</label>
                  <select name="service_id" class="custom-select form-control-border" id="exampleSelectBorder">
                    @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">

                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">
                      Service description
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <textarea id="summernote" name="desc" value="{{old($servicescategory->desc)}}">

                    </textarea>
                  </div>
                  <div class="custom-control custom-switch">

                    <input {{ old('status', $service->status) == 1 ? "checked" : "" }} value="1" name="status" type="checkbox" class="custom-control-input" type="checkbox" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">Status</label>
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