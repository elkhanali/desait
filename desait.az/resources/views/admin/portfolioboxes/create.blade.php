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
            <h3 class="card-title ">Create Portfolio Box </h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{route('portfolioboxes.index.store')}}" enctype="multipart/form-data">
            @csrf


            <div class="card-body">
              <div class="form-group">
                <label for="portfolio_boxes_category"> Portfolio Box Category</label>
                <input type="text" name="portfolio_boxes_category" value="{{old('portfolio_boxes_category')}}" class="form-control" id="portfolio_boxes_category" placeholder="Enter Box Category">
              </div>
              <div class="form-group">
                <label for="header"> Header</label>
                <input type="text" name="header" value="{{old('header')}}" class="form-control" id="header" placeholder="Enter Header">
              </div>
              <div class="form-group">
                <label for="desc"> Description</label>
                <input type="text" name="desc" value="{{old('desc')}}" class="form-control" id="desc" placeholder="Enter Description">
              </div>
              <div class="form-group">
                <label for="rows">Roles</label>
                <input type="text" name="rows" value="{{old('rows')}}" class="form-control" id="rows" placeholder="Enter Roles">
              </div>
              <div class="form-group">
                <label for="banner_header">Banner Header</label>
                <input type="text" name="banner_header" value="{{old('banner_header')}}" class="form-control" id="banner_header" placeholder="Enter Header">
              </div>
              <div class="form-group">
                <label for="banner_desc">Banner Description</label>
                <input type="text" name="banner_desc" value="{{old('banner_desc')}}" class="form-control" id="banner_desc" placeholder="Enter Description">
              </div>
              <div class="form-group">
                <label for="banner_detail">Banner Detail</label>
                <input type="text" name="banner_detail" value="{{old('banner_detail')}}" class="form-control" id="banner_detail" placeholder="Enter Description">
              </div>
              <div class="form-group">
                <label for="title">Portfolio Box Title</label>
                <input type="text" name="title" value="" class="form-control" id="title" placeholder="Enter Box Title">
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleSelectBorder">Portfolio Category</label>
                  <select name="category_id" class="custom-select form-control-border" id="exampleSelectBorder">
                    @foreach($portfoliocategories as $category)
                    <option value="{{$category->id}}">{{$category->portfolios_categories_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Box image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" value="" class="form-control" id="exampleInputFile" placeholder="Enter image">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text"> Upload</span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-switch">

                    <input {{ old('status') == 1 ? "checked" : "" }} value="1" name="status" type="checkbox" class="custom-control-input" type="checkbox" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">Status</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Banner image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="banner_image" value="" class="form-control" id="exampleInputFile2" placeholder="Enter image">
                    <label class="custom-file-label" for="exampleInputFile2">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text"> Upload</span>
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