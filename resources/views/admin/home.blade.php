@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- First panel: Manage users -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-dashboard"></span>
                <strong> Manage Users</strong>
            </div>
            <div class="panel-body">
                <div class="btn-group btn-group-justified">
                    <a href="/admins/manage/teachers" class="btn btn-default">
                        <span class="glyphicon glyphicon-user"></span> Manage Teachers
                    </a>
                    <a href="/admins/manage/students" class="btn btn-default">
                        <span class="glyphicon glyphicon-user"></span> Manage Students
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Second panle: Manage Departments, Sections and Hostels-->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-dashboard"></span>
                <strong> Manage Departments, Sections and Hostels</strong>
            </div>
            <div class="panel-body">
                <div class="btn-group btn-group-justified">
                    <a href="/admins/manage/departments" class="btn btn-default">
                        <span class="glyphicon glyphicon-user"></span> Manage Departments
                    </a>
                    <a href="/admins/manage/sections" class="btn btn-default">
                        <span class="glyphicon glyphicon-user"></span> Manage Sections
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
