@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>WELCOME STUDENT</h2></div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">Personal Information</div>

                <div class="panel-body">
                    Name:<br>
                    Roll No:<br>
                    Department:<br>
                    Email Id:<br>
                    Hostel:<br>
                    Contact:<br>
                    Current Address: <br>
                    Permanent Address: <br>
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <button class="btn-primary">Attendence</button>
                    <button class="btn-primary">Assignments</button>
                    <button class="btn-primary">Notices</button>
                    <button class="btn-primary">Messages</button>
                    <button class="btn-primary">Results</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
