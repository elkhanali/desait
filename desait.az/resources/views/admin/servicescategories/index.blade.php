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
            <h3 class="card-title">Servives Categories</h3>
            <a href="{{route('servicescategories.index.create')}}" style=" margin-left: 100px;" class="btn btn-primary">+ Create</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Servives Categories Name</th>
                  <th>Slug</th>
                  <th>ServicesID</th>
                  <th>Description</th>
                  <th>Actions</th>
                  <!-- <th>Status</th> -->

                </tr>
              </thead>

              <tbody>
                <tr>
                  @foreach($servicescategories as $servicescategory)
                <tr>
                  <td>{{$servicescategory->name}}</td>
                  <td>{{$servicescategory->slug}}</td>
                  <td>{{$servicescategory->service_id}}</td>
                  <td>{{$servicescategory->desc}}</td>
                  <!-- <td>{{$servicescategory->status}}</td> -->

                  <td>
                    <a href="{{route('servicescategories.index.edit',$servicescategory->id)}}" class="btn btn-block btn-primary ">Edit</a>
                    <form method="post" action="{{ route('servicescategories.index.destroy', $servicescategory->id) }}">
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