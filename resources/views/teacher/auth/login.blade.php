@extends('layouts.app')

@section('content')
<div class="container" style="background-color:rgba(0,110,80,0.9)">
	<div class="row" style="padding-top:20px">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:rgb(0,110,80);color:rgb(255,255,255)">
					<strong> Login To The Portal</strong>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form"  action="/teachers/login" method="post">
						
					{{ csrf_field() }}
					@include('common.errors')
					<div class="form-group">
						<label class="col-md-4 control-label" for="FacultyID">FacultyID :</label>
						<div class="col-md-6">
					    <input required-class="form-control" type="text" name="FacultyID" value="" size="22px">
					    </div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="PWDpassword">Password :</label>
						<div class="col-md-6">
					    <input required-class="form-control" type="password" name="PWDpassword" value="" size="22px">
					    </div>
					</div>
					<div class="form-group" style="color:rgb(0,110,80)">
						<label class="col-md-4 control-label" for="submit"></label>
						<div class="col-md-6">
					    <input required-class="form-control" type="submit" name="submit" value="login">
					    </div>
					</div>
					     
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection