@extends('admin.index')

@section('style')
  <!-- DataTables CSS -->
  <link href="{{asset('assets/startmin/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="{{asset('assets/startmin/css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">

@endsection

@section('pagecontent')
  {{-- {{dd($users)}} --}}
  <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <button type="button" class="btn btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Add User</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $key => $value)
                                <tr>
                                    <td>{{$value['id']}}</td>
                                    <td>{{$value['name']}}</td>
                                    <td>{{$value['email']}}</td>
                                    @foreach ($value['roles'] as $data => $subdata)
                                    <td>{{$subdata['name']}}</td>
                                    @endforeach
                                    <td class="text-center">
                                    <a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                                  </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->

            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection

@section('script')
  <!-- DataTables JavaScript -->
  <script src="{{ asset('assets/startmin/js/dataTables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/startmin/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/table.js') }}"></script>
@endsection
