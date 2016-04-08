@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-pushpin"></span>
                        <strong> Courses currently entered in the database.</strong>
                    </div>
                    <div class="panel-body">
                        @if (count($courses) > 0)
                                <!-- Current courses list -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department Code</th>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        <td>{{ $course->dCode }}</td>
                                        <td>{{ $course->courseCode }}</td>
                                        <td>{{ $course->courseName }}</td>
                                        <td>
                                            <form action="/admins/manage/courses" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input hidden name="courseCode" value="{{ $course->courseCode }}">

                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">
                                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            No Course is currently entered in the database.
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Course creation form -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span>
                        <strong> Add new course</strong>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="/admins/manage/courses"
                              accept-charset="UTF-8" id="courseCreationForm">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                                    <!-- Display Validation Errors -->
                            @include('common.errors')

                                    <!-- First row Course Code-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="courseCode">Course Code</label>
                                <div class="col-md-6">
                                    <input required class="form-control" name="courseCode" type="text" id="courseCode">
                                </div>
                            </div>

                            <!-- Second row courseName-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="courseName">Course Name</label>
                                <div class="col-md-6">
                                    <input required class="form-control" name="courseName" type="text" id="courseName">
                                </div>
                            </div>

                            <!-- Third row dName-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="department">Department</label>
                                <div class="col-md-6">
                                    <select required id="department" name="dCode" class="form-control">
                                        <option value="">Select a Department...</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->dCode}}">{{$department->dName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Third row create button-->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button class="btn btn-primary" type="submit" id="createButton">
                                        <span class="glyphicon glyphicon-log-in"></span> Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection