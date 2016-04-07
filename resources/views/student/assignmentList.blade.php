@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-book"></span>
                        <strong> List of assignments</strong>
                    </div>

                    <div class="panel-body">
                        @if($assignments->isEmpty())
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
                                @foreach($assignments as $assignment)
                                    <tr>
                                        <td>{{$assignment->teachingDetail->course->courseName}}</td>
                                        <td>{{$assignment->number}}</td>
                                        <td>{{$assignment->title}}</td>
                                        <td>{{$assignment->created_at}}</td>
                                        <td>{{$assignment->dueDate}}</td>
                                        <td>
                                            <a href="" id="assignmentLink{{$assignment->courseCode}}{{$assignment->number}}" class="btn btn-primary btn-sm"
                                               onclick='setLinkUrl(this.id, document.URL + "/", "{{$assignment->courseCode}}" + "/" + "{{$assignment->number}}")'>
                                                <span class="glyphicon glyphicon-hand-right"></span> View
                                            </a>
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