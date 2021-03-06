@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <!-- First panel: Ask a doubt -->
            <div class="panel panel-default">
                    <div class="panel-heading" id="headingOne">
                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                           href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="glyphicon glyphicon-question-sign"></span>
                            <strong> Ask a doubt</strong>
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">

                            @include('common.errors')

                            <form action="/students/queries" role="form" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                <div class="col-md-2">
                                    <select required id="courseCode" name="courseCode" class="form-control">
                                        <option value="">Select a Course...</option>
                                        @foreach($academicRecords as $academicRecord)
                                            <option value="{{$academicRecord->courseCode}}">
                                                {{$academicRecord->teachingDetail->course->courseName}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="description" required class="form-control verticalAlign" rows="4" placeholder="Write about your doubt here"></textarea>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">
                                        <span class="glyphicon glyphicon-arrow-right"></span> Ask
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            <!-- Second panel: List of asked doubts-->
            <div class="panel panel-default">
                <div class="panel-heading" id="headingTwo">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <strong> List of asked doubts</strong>
                    </a>
                </div>

                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                            @if($queries->isEmpty())
                                You have not asked any doubt.
                            @else
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course</th>
                                            <th>Asked</th>
                                            <th>Description</th>
                                            <th>Response</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($queries as $query)
                                            <tr>
                                                <td>{{++$count}}</td>
                                                <td>{{$query->academicRecord->teachingDetail->course->courseName}}</td>
                                                <td>{{$query->created_at}}</td>
                                                <td>
                                                    <textarea disabled class="form-control verticalAlign" rows="4">{{$query->description}}</textarea>
                                                </td>
                                                <td>
                                                    <textarea disabled class="form-control verticalAlign" rows="4">{{$query->response}}</textarea>
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
