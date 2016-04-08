@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <strong> Personal Information</strong>
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td><strong>Name</strong></td>
                                    <td>{{$teacher->name}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Id</strong></td>
                                    <td>{{$teacher->facultyId}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Department</strong></td>
                                    <td>{{$department}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Office address</strong></td>
                                    <td>{{$teacher->office}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td>{{$teacher->email}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone no</strong></td>
                                    <td>{{$teacher->phoneNo}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
