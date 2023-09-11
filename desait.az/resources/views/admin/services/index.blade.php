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
            <h3 class="card-title">Services </h3>
            <a href="{{route('services.index.create')}}" style=" margin-left: 100px;" class="btn btn-primary">+ Create</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Service Image</th>
                  <th>Service Icon</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Detail</th>
                  <th>Status</th>
                  <th>Id</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  @foreach($services as $service)
                <tr>
                  <td><img src="{{asset('assets/image/'.$service->service_image)}}" style="width: 200px; height:90px;" alt=""></td>
                  <td><img src="{{asset('assets/image/'.$service->service_icon)}}" style="width: 90px; height:60px;" alt=""></td>
                  <td>{{$service->name}}</td>
                  <td>{{$service->slug}}</td>
                  <td>{{$service->service_detail}}</td>
                  <td>{{$service->status}}</td>
                  <td>{{$service->id}}</td>



                  <td>
                    <a href="{{route('services.index.edit',$service->id)}}" class="btn btn-block btn-primary ">Edit</a>
                    <form method="post" action="{{ route('services.index.destroy', $service->id) }}">
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