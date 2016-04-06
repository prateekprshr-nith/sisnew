@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <strong> Your performance</strong>
                    </div>

                    <div class="panel-body">
                        @if($academicRecords->isEmpty())
                                You are not enrolled in any courses.
                        @else
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Course</th>
                                        <th>Periodical Marks</th>
                                        <th>Assesment Marks</th>
                                        <th>Final Marks</th>
                                        <th>Total Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($academicRecords as $academicRecord)
                                        <tr>
                                            <td>{{$academicRecord->teachingDetail->course->courseName}}</td>
                                            <td>
                                                @if($academicRecord->periodicalMarks != null)
                                                    {{$academicRecord->periodicalMarks}}
                                                @else
                                                    NA
                                                @endif
                                            </td>
                                            <td>
                                                @if($academicRecord->asnMarks != null)
                                                    {{$academicRecord->asnMarks}}
                                                @else
                                                    NA
                                                @endif
                                            </td>
                                            <td>
                                                @if($academicRecord->finalMarks != null)
                                                    {{$academicRecord->finalMarks}}
                                                @else
                                                    NA
                                                @endif
                                            </td>
                                            <td>
                                                @if($academicRecord->periodicalMarks == null ||
                                                    $academicRecord->asnMarks == null ||
                                                    $academicRecord->finalMarks == null
                                                   )
                                                    NA
                                                @else
                                                    {{$academicRecord->periodicalMarks + $academicRecord->asnMarks + $academicRecord->finalMarks}}
                                                @endif
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