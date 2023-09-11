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
            <h3 class="card-title">Portfolio Categories</h3>
            <a href="{{route('portfoliocategories.index.create')}}" style=" margin-left: 100px;" class="btn btn-primary">+ Create</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Portfolio Categories Name</th>
                  <th>Slug</th>
                  <th>ID</th>
                  <th>Status</th>

                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  @foreach($portfoliocategories as $portfoliocategory)
                <tr>
                  <td>{{$portfoliocategory->portfolios_categories_name}}</td>
                  <td>{{$portfoliocategory->slug}}</td>
                  <td>{{$portfoliocategory->id}}</td>
                  <td>{{$portfoliocategory->status}}</td>

                  <td>
                    <a href="{{route('portfoliocategories.index.edit',$portfoliocategory->id)}}" class="btn btn-block btn-primary ">Edit</a>
                    <form method="post" action="{{ route('portfoliocategories.index.destroy', $portfoliocategory->id) }}">
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