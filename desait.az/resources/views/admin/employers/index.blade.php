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
            <h3 class="card-title">Employers</h3>
            <a href="{{route('employers.index.create')}}" style=" margin-left: 100px;" class="btn btn-primary">+ Create</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Employer image</th>
                  <th>Employer Name</th>
                  <th>Employer duty</th>



                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  @foreach($employers as $employer)
                <tr>
                  <td><img src="{{asset('assets/image/'.$employer->image)}}" style="width: 200px; height:90px;" alt=""></td>
                  <td>{{$employer->name}}</td>
                  <td>{{$employer->duty}}</td>



                  <td>
                    <a href="{{route('employers.index.edit',$employer->id)}}" class="btn btn-block btn-primary ">Edit</a>
                    <form method="post" action="{{ route('employers.index.destroy', $employer->id) }}">
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