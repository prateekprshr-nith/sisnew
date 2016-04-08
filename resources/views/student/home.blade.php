@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-info-sign"></span>
                    <strong> Personal Information</strong>
                </div>

                <div class="panel-body">
                    <img src="{{ url('/students/image') }}" id="profileImage" class="img-thumbnail col-md-2"
                         height="200" width="200" alt="Cinque Terre" onerror="loadAvatarIcon('profileImage')">
                    <div class="col-md-10">
                        <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td>{{$student->name}}</td>
                        </tr>
                        <tr>
                            <td><strong>Father's name</strong></td>
                            <td>{{$student->fatherName}}</td>
                        </tr>
                        <tr>
                            <td><strong>Mother's name</strong></td>
                            <td>{{$student->motherName}}</td>
                        </tr>
                        <tr>
                            <td><strong>Roll No.</strong></td>
                            <td>{{$student->rollNo}}</td>
                        </tr><tr>
                            <td><strong>Department</strong></td>
                            <td>{{$department}}</td>
                        </tr>
                        <tr>
                            <td><strong>Section</strong></td>
                            <td>{{$student->sectionId}}</td>
                        </tr>
                        <tr>
                            <td><strong>Semester</strong></td>
                            <td>{{$student->semNo}}</td>
                        </tr>
                        <tr>
                            <td><strong>Date of Birth</strong></td>
                            <td>{{$student->dob}}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{$student->email}}</td>
                        </tr>
                        <tr>
                            <td><strong>Phone no</strong></td>
                            <td>{{$student->phoneNo}}</td>
                        </tr>
                        <tr>
                            <td><strong>Current Address</strong></td>
                            <td>{{$student->currentAddress}}</td>
                        </tr>
                        <tr>
                            <td><strong>Permanent Address</strong></td>
                            <td>{{$student->permanentAddress}}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
