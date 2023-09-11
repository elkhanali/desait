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
            <h3 class="card-title">Blog Boxes</h3>
            <a href="{{route('blogboxes.index.create')}}" style=" margin-left: 100px;" class="btn btn-primary">+ Create</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Box image</th>
                  <th>Blog Box Category</th>
                  <th>Desc</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  @foreach($blogboxes as $blogbox)
                <tr>
                  <td><img src="{{asset('assets/image/'.$blogbox->image)}}" style="width: 200px; height:90px;" alt=""></td>
                  <td>{{$blogbox->blog_boxes_category}} . {{$blogbox->created_at}} </td>
                  <td>{{$blogbox->desc}}</td>
                  <td>
                    <a href="{{route('blogboxes.index.edit',$blogbox->id)}}" class="btn btn-block btn-primary ">Edit</a>
                    <form method="post" action="{{ route('blogboxes.index.destroy', $blogbox->id) }}">
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