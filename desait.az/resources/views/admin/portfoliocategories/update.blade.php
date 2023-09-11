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


         
           <x-alert-message/>


           @if($errors->any())
           
           @foreach($errors->all() as $error)
           
           <li class="alert alert-danger">{{$error}}</li>

           @endforeach
         
          @endif


         
            <!-- general form elements -->
            <div class="card card-primary ">
              <div class="card-header">
                <h3 class="card-title ">Portfolio Category Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('portfoliocategories.index.update',$portfoliocategory->id)}}">
                @csrf


                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Category name</label>
                    <input type="text" name="portfolios_categories_name" value="{{old('portfolios_categories_name',$portfoliocategory->portfolios_categories_name)}}" class="form-control" id="name" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" value="{{$portfoliocategory->slug}}"class="form-control" id="slug" placeholder="Enter slug">
                  </div>
                
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <!-- <input name="status"  @checked((bool)old('status',$portfoliocategory->status==1 )) type="checkbox" class="custom-control-input" id="customSwitch1"> -->
                      <input {{ old('status', $portfoliocategory->status) == 1 ? "checked" : "" }} value="1" name="status" type="checkbox" class="custom-control-input" type="checkbox" id="customSwitch1">
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