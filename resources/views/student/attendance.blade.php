@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <strong> Your attendance</strong>
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Course code</th>
                                    <th>Classes attended</th>
                                    <th>Lectures held</th>
                                    <th>Attendance %</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($academicRecords as $academicRecord)
                                    <tr>
                                        <td>{{$academicRecord->courseCode}}</td>
                                        <td>
                                            @if($academicRecord->attendance != null)
                                                {{$academicRecord->attendance}}
                                            @else
                                                NA
                                            @endif
                                        </td>
                                        <td>
                                            @if($academicRecord->teachingDetail->lecturesHeld != null)
                                                {{$academicRecord->teachingDetail->lecturesHeld}}
                                            @else
                                                NA
                                            @endif
                                        </td>
                                        <td>
                                            @if($academicRecord->attendance == null ||
                                                $academicRecord->teachingDetail->lecturesHeld == null
                                               )
                                                NA
                                            @else
                                                {{-- */$percent = round(($academicRecord->attendance / $academicRecord->teachingDetail->lecturesHeld), 5) * 100;/* --}}
                                                @if($percent < 75)
                                                    {{$percent}} <span class="glyphicon glyphicon-exclamation-sign"></span>
                                                @else
                                                    {{$percent}}
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection