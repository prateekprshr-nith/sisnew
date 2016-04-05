@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Select a course-->
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-plus"></span>
                    <strong> Select a course to view student record</strong>
                </div>

                <div class="panel-body">
                    <div class="input-group input-group-sm">
                        @if($teacherCourses->isEmpty())
                            No courses have been added. Add a course from <a href="/teachers/courses">here</a>
                        @else
                            <select required id="courseCode" name="courseCode" class="form-control">
                                <option value="">Select a Course...</option>
                                @foreach($teacherCourses as $teacherCourse)
                                    <option value="{{$teacherCourse->courseCode}}">{{$teacherCourse->course->courseName}}</option>
                                @endforeach
                            </select>

                            <span class="input-group-btn">
                            <a href="#" id="studentRecordLink" class="btn btn-primary"
                               onclick='setLinkUrl("studentRecordLink", "/teachers/studentRecords/" + document.getElementById("courseCode").value)'>
                                <span class="glyphicon glyphicon-plus"></span> View Record
                            </a>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
