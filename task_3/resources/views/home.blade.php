@extends('layouts.app')

@section('content')
  @if(session('messages'))
  <div class="alert alert-danger text-center" ><strong>Danger!</strong>{{session('messages')}} </div>
@endif



    </div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
