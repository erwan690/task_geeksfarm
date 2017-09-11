@extends('admin.index')

@section('style')
  <!-- DataTables CSS -->
  <link href="{{asset('assets/startmin/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="{{asset('assets/startmin/css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Add User</button>

          <form id="custom-search-form" class="form-search form-horizontal pull-right">
              <div class="input-append span12">
                  <input name="search" type="text" id="search-query" placeholder="Search">
                  <button id="search-tablena" type="submit" class="btn"><i class="icon-search"></i></button>
              </div>
          </form>

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
                                    <button id="get" class='btn btn-info btn-xs' value="{{$value['id']}}"><span class="glyphicon glyphicon-edit"></span>Edit</button>
                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal"><span class="glyphicon glyphicon-remove"></span> Del</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                      {{ $users->links() }}
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

  <!-- Modal add user-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['method' => 'POST', 'route' => 'user.store', 'class' => 'form-horizontal']) !!}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('name', null, ['class' => 'form-control name-model', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
        </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              {!! Form::label('email', 'Email address', ['class' =>'col-sm-3 control-label']) !!}
              <div class="col-sm-9">
                  {!! Form::email('email', null, ['class' => 'form-control email-model', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                  <small class="text-danger">{{ $errors->first('email') }}</small>
              </div>
          </div>
          <div id="passwordna">
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-sm-9">
                      {!! Form::password('password', ['class' => 'form-control ', 'required' => 'required']) !!}
                      <small class="text-danger">{{ $errors->first('password') }}</small>
                  </div>
          </div>
          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              {!! Form::label('password_confirmation', 'Password Confimation', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-sm-9">
                      {!! Form::password('password_confirmation', ['class' => 'form-control ', 'required' => 'required']) !!}
                      <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                  </div>
          </div>
        </div>
          <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
              {!! Form::label('roles', 'Select Roles', ['class' => 'col-sm-3 control-label']) !!}
              <div class="col-sm-9">
                  {!! Form::select('roles',[$roles[0]->name=>$roles[0]->name,
                  $roles[1]->name=>$roles[1]->name],$roles[0]->name,['class' => 'form-control roles-model', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('roles') }}</small>
              </div>
          </div>


      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
            {!! Form::reset("Reset", ['class' => 'btn btn-warning', 'id'=> 'resetna']) !!}
            {!! Form::submit("Add", ['class' => 'btn btn-success','id'=> 'add-user']) !!}
        </div>
          {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>

@if(Session::has('errors'))
<script type="">
$(document).ready(function(){
  $('#myModal').modal({show: true});
}
</script>
@endif

<!-- Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete User</h4>
      </div>
      <div class="modal-body">
        <p class="text-center">Are You Sure To Delete this User ?</p>
      </div>
      <div class="modal-footer">

        <div class="btn-group pull-right">
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
      </div>
      {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy',$value['id']], 'class' => 'form-horizontal']) !!}
          <div class="btn-group pull-right">
              {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
          </div>
      {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>
<div id="the-return">
  [HTML is replaced when successful.]
</div>
@endsection

@section('script')

  <!-- DataTables JavaScript -->
  <script src="{{ asset('assets/startmin/js/dataTables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/startmin/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
  {{-- <script src="{{ asset('js/table.js') }}"></script> --}}
  <script src="{{ asset('js/user.js') }}"></script>
@endsection
