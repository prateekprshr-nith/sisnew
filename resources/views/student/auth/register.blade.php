@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-md-offset-0" >
				<div class="panel panel-default" style="background-color:#b3cccc">
					<div class="panel-heading" style="background-color:#75a3a3;color:#ffffff">
						<strong>Signup : Please enter your details correctly </strong>
					</div>
					<div class="panel-body">
						<form class="form-horzontal" role="form" method="POST" action="/students/register">
							<input required name="_token" type="hidden">
							{{ csrf_field() }}

							@include('common.errors')

							<div class="from-group">
								<label required class="col-md-2 control-label" for="name">Name</label>
								<div class="col-md-4 style="padding-right:0px"">
									<input required type="text" name="name">				
								</div>
								<label class="col-md-2 control-label" for="rollNo">Roll No</label>
								<div class="col-md-4">
									<input required type="text" name="rollNo">
								</div>
								<label class="col-md-2 control-label" for="semNo">Semester No</label>
								<div class="col-md-4">
									<input required type="text" name="semNo">
								</div>
								<label class="col-md-2 control-label" for="registrationNo">Registration No</label>
								<div class="col-md-4">
									<input required type="text" name="registrationNo">
								</div>
								<label class="col-md-2 control-label" for="sectionId">Section ID</label>
								<div class="col-md-4">
									<input required type="text" name="sectionId">
								</div>	
								<label class="col-md-2 control-label" for="fatherName">Father Name </label>
								<div class="col-md-4">
									<input required type="text" name="fatherName">
								</div>
								<label class="col-md-2 control-label" for="currentAddress">Current Address</label>
								<div class="col-md-4">
									<input required type="text" name="currentAddress">
								</div>	
								<label class="col-md-2 control-label" for="motherName">Mother Name </label>
								<div class="col-md-4">
									<input required type="text" name="motherName">
								</div>											
								<label class="col-md-2 control-label" for="permanentAddress">Permanent Address</label>
								<div class="col-md-4">
									<input required type="text" name="permanentAddress">
								</div>								
								<label class="col-md-2 control-label " for="dob">D.O.B</label>
								<div class="col-md-4">
									<input required type="text" name="dob">
								</div>
								<label class="col-md-2 control-label" for="phoneNo">Phone No</label>
								<div class="col-md-4">
									<input required type="text" name="phoneNo">
								</div>
								<label class="col-md-2 control-label" for="email">Email ID</label>
								<div class="col-md-4">
									<input required type="text" name="email">
								</div>
								<label class="col-md-2 control-label" for="password">Password</label>
								<div class="col-md-4">
									<input required type="text" name="password">
								</div>
								<label class="col-md-2 control-label" for="dCode">Department Code</label>
								<!--<div class="col-md-4">
									<input required type="text" name="dCode">
								</div>-->
								<select class="col-md-2 control-label" style="margin-left:15px">
									<option value="dp01">DP01</option>
  									<option value="dp02">DP02</option>
  									<option value="dp03">DP03</option>
  									<option value="dp04">DP04</option>
								</select>
								<div>
									<input style="margin-top:40px;margin-right:0px" type="submit" value="submit">
								</div>																																																																			
							</div>
						</form>
					</div>
				</div>

			</div>			
		</div>
	</div>
@endsection