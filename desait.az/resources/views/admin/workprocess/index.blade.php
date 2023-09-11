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
            <h3 class="card-title">Work Proccess</h3>
            <a href="{{route('workprocess.index.create')}}" style=" margin-left: 100px;" class="btn btn-primary">+ Create</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Work process icon</th>
                  <th>Work process Name</th>
                  <th>Desc</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  @foreach($workprocess as $process)
                <tr>
                  <td><img src="{{asset('assets/image/'.$process->proccess_icon)}}" style="width: 200px; height:90px;" alt=""></td>
                  <td>{{$process->proccess_title}}</td>
                  <td>{{$process->proccess_desc}}</td>



                  <td>
                    <a href="{{route('workprocess.index.edit',$process->id)}}" class="btn btn-block btn-primary ">Edit</a>
                    <form method="post" action="{{ route('workprocess.index.destroy', $process->id) }}">
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