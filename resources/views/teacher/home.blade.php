@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>WELCOME USER</h2></div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">Personal Information</div>

                <div class="panel-body">
                    Name:<br>
                    FacultyID:<br>
                    Department:<br>
                    Email Id:<br>
                    Office:<br>
                    Contact:<br>
                </div>
            </div>
        </div>


        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <button class="btn-primary">Attendence</button>
                    <button class="btn-primary">Assignments</button>
                    <button class="btn-primary">Queries</button>
                    <button class="btn-primary">Results</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
