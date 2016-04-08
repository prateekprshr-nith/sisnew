@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-book"></span>
                        <strong> List of given assignments</strong>
                    </div>

                    <div class="panel-body">
                        @if($courses->isEmpty())
                            No assignments have been given.
                        @else
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Course</th>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Given on</th>
                                        <th>Due date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses as $course)
                                        @foreach($course->assignments as $assignment)
                                            <tr>
                                                <td>{{$assignment->teachingDetail->course->courseName}}</td>
                                                <td>{{$assignment->number}}</td>
                                                <td>{{$assignment->title}}</td>
                                                <td>{{date_format($assignment->created_at, 'Y-m-d')}}</td>
                                                <td>{{$assignment->dueDate}}</td>
                                                <td>
                                                    <a href="" id="courseLink{{$course->courseCode}}{{$assignment->number}}" class="btn-primary btn-sm"
                                                       onclick='setLinkUrl(this.id, document.URL + "/", "{{$course->courseCode}}" + "/" + "{{$assignment->number}}")'>
                                                        <span class="glyphicon glyphicon-hand-right"></span> View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="panel-footer text-right">
                        <a href="assignments/add" class="btn-sm btn-primary">
                            <span class="glyphicon glyphicon-plus"></span> Give new assignment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection