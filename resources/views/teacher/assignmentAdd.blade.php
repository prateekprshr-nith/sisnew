@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-book"></span>
                        <strong>Give a new assignment</strong>
                    </div>

                    <form action="/teachers/assignments/add" method="post" class="form-horizontal">
                        <div class="panel-body">
                            {{csrf_field()}}

                            @include('common.errors')

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="courseCode" class="control-label">Course</label>
                                    <select required name="courseCode" class="form-control" id="courseCode">
                                        <option value="">Select a Course...</option>
                                        @foreach($courses as $course)
                                            <option value="{{$course->courseCode}}">{{$course->course->courseName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="title" class="control-label">Title</label>
                                    <input required type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="number" class="control-label">Number</label>
                                    <input required type="number" name="number" class="form-control" id="number" min="0">
                                </div>
                                <div class="col-md-3">
                                    <label for="dueDate" class="control-label">Due date (yy-mm-dd)</label>
                                    <input required type="date" name="dueDate" class="form-control" id="dueDate" value="{{old('dueDate')}}">
                                </div>
                            </div>
                            <label for="description" class="control-label">Description of the assignment</label>
                            <textarea required class="form-control verticalAlign" rows="17" name="description" placeholder="Write the contents of assignment here" id="description">{{old('description')}}</textarea>
                        </div>
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <span class="glyphicon glyphicon-plus"></span> Give assignment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection