@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Add a new course-->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span>
                        <strong> Add new course</strong>
                    </div>

                    <div class="panel-body">
                        <form action="/teachers/courses/addCourse" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="input-group input-group-sm">
                                <select required name="courseCode" class="form-control">
                                    <option value="">Select a Course...</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->courseCode}}">{{$course->courseName}}</option>
                                    @endforeach
                                </select>

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

            <!-- Current courses-->
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <strong> Information of courses being taught</strong>
                    </div>

                    <div class="panel-body">

                        @include('common.errors')

                        @if($teacherCourses->isEmpty())
                            No courses have been added. Add a new course from side panel.
                        @else
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td><strong>Course Code</strong></td>
                                        <td><strong>Course Name</strong></td>
                                        <td><strong>Lectures Held</strong></td>
                                        <td><strong>Update Lectures</strong></td>
                                        <td><strong>Remove</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teacherCourses as $teacherCourse)
                                        <tr>
                                            <td>{{$teacherCourse->courseCode}}</td>
                                            <td>
                                                @if($teacherCourse->course->courseName != null)
                                                    {{$teacherCourse->course->courseName}}
                                                @else
                                                    NA
                                                @endif
                                            </td>
                                            <td>
                                                @if($teacherCourse->lecturesHeld != null)
                                                    {{$teacherCourse->lecturesHeld}}
                                                @else
                                                    NA
                                                @endif
                                            </td>
                                            <td>
                                                <form action="/teachers/courses/updateLectures" method="POST" class="form-inline">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                        <div class="input-group input-group-sm">
                                                            <input type="text" name="lecturesHeld" required class="form-control"
                                                                   placeholder="{{$teacherCourse->lecturesHeld}}">

                                                            <input type="text" name="courseCode" hidden
                                                                   value="{{$teacherCourse->courseCode}}">

                                                            <span class="input-group-btn">
                                                                <button class="btn btn-primary" type="submit">
                                                                    <span class="glyphicon glyphicon-plus"></span> Update
                                                                </button>
                                                            </span>
                                                        </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="/teachers/courses/removeCourse" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <input type="text" name="courseCode" hidden
                                                           value="{{$teacherCourse->courseCode}}">
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?')">
                                                        <span class="glyphicon glyphicon-remove"></span> Remove
                                                    </button>
                                                </form>
                                            </td>
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
