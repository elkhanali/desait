@extends('admin.layouts.master')


@section('content')

<style>
  .row{
    width: max-content;
  }
</style>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <x-alert-message />
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Portfolio Boxes</h3>
            <a href="{{route('portfolioboxes.index.create')}}" style=" margin-left:100px" class="btn btn-primary">+ Create</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Portfolio image</th>
                  <th>Banner image</th>
                  <th>Portfolio Box Category</th>
                  <th>Header</th>
                  <th>Portfolio Box Title</th>
                  <th>Description</th>
                  <th>Rows</th>
                  <th>Banner Header</th>
                  <th>Banner Description</th>
                  <th>Banner Detail</th>



                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  @foreach($portfolioboxes as $portfoliobox)
                <tr>
                  <td><img src="{{asset('assets/image/'.$portfoliobox->image)}}" style="width: 200px; height:90px;" alt=""></td>
                  <td><img src="{{asset('assets/image/'.$portfoliobox->banner_image)}}" style="width: 200px; height:90px;" alt=""></td>
                  <td>{{$portfoliobox->portfolio_boxes_category}}</td>
                  <td>{{$portfoliobox->header}}</td>
                  <td>{{$portfoliobox->title}}</td>
                  <td>{{$portfoliobox->desc}}</td>
                  <td>{{$portfoliobox->rows}}</td>
                  <td>{{$portfoliobox->banner_header}}</td>
                  <td>{{$portfoliobox->banner_desc}}</td>
                  <td>{{$portfoliobox->banner_detail}}</td>




                  <td>
                    <a href="{{route('portfolioboxes.index.edit',$portfoliobox->id)}}" class="btn btn-block btn-primary ">Edit</a>
                    <form method="post" action="{{ route('portfolioboxes.index.destroy', $portfoliobox->id) }}">
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