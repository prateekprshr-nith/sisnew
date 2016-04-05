@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Add a new student-->
            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span>
                        <strong> Add new student</strong>
                    </div>

                    <div class="panel-body">
                        <form action="/teachers/studentRecords/{{$courseCode}}/addStudentRecord" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="input-group input-group-sm">
                                <input required  type="text" name="rollNo" class="form-control" placeholder="Roll No.">
                                <input required  type="hidden" name="courseCode" value="{{$courseCode}}">

                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <span class="glyphicon glyphicon-plus"></span> Add
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Current students-->
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-record"></span>
                        <strong> Student records for {{$courseCode}}</strong>
                    </div>

                    <div class="panel-body">

                        @include('common.errors')

                        @if($students->isEmpty())
                            No students have been added. Add a new student from side panel.
                        @else
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <td><strong>#</strong></td>
                                    <td><strong>Name</strong></td>
                                    <td><strong>Roll No.</strong></td>
                                    <td><strong>Attendance</strong></td>
                                    <td><strong>Periodical Marks</strong></td>
                                    <td><strong>Internal Marks</strong></td>
                                    <td><strong>Final Marks</strong></td>
                                    <td><strong>Update</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        <td>{{$student->student->name}}</td>
                                        <td>
                                            @if($student->rollNo != null)
                                                {{$student->rollNo}}
                                            @else
                                                NA
                                            @endif
                                        </td>
                                        <form action="/teachers/studentRecords/{{$courseCode}}/updateStudentRecord" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <td>
                                                <div class="input-group input-group-sm col-md-5">
                                                    <input class="form-control" type="text" name="attendance"
                                                           value="{{$student->attendance}}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm col-md-5">
                                                    <input class="form-control" type="text" name="periodicalMarks"
                                                           value="{{$student->periodicalMarks}}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm col-md-5">
                                                    <input class="form-control" type="text" name="asnMarks"
                                                           value="{{$student->asnMarks}}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm col-md-5">
                                                    <input class="form-control" type="text" name="finalMarks"
                                                           value="{{$student->finalMarks}}">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm" type="submit">
                                                    <span class="glyphicon glyphicon-plus"></span> Update
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
