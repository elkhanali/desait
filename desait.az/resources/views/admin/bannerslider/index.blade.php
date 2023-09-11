@extends('admin.layouts.master')


@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <x-alert-message />
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Banner Slider</h3>
            <a href="{{route('bannerslider.index.create')}}" style=" margin-left:100px" class="btn btn-primary">+ Create</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Slider image</th>
                  <th>Tile</th>
                  <th>Desc</th>

                  <!-- <th>Slug</th> -->

                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  @foreach($bannerslider as $slider)
                <tr>
                  <td><img src="{{asset('assets/image/'.$slider->image)}}" style="width: 200px; height:90px;" alt=""></td>
                  <td>{{$slider->title}}</td>
                  <td>{{$slider->desc}}</td>

                  <!-- <td>{{$slider->slug}}</td> -->

                  <td>
                    <a href="{{route('bannerslider.index.edit',$slider->id)}}" class="btn btn-block btn-primary ">Edit</a>
                    <form method="post" action="{{ route('bannerslider.index.destroy', $slider->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Sil</button>
                    </form>

                    <!-- <a class="btn btn-block btn-danger">Delete</a> -->
                  </td>

                </tr>

                @endforeach
                </tr>
              </tbody>

            </table>
          </div>
          <!-- /.card-body -->
        </div>

      </div>

    </div>

  </div>

</section>
@endsection