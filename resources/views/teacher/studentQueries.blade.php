@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!--List of asked doubts-->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-info-sign"></span>
                <strong> List of student doubts for {{$courseCode}}</strong>
            </div>
            <div class="panel-body">
                @if($queries->isEmpty())
                    No doubts have been asked.
                @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Roll No</th>
                            <th>Asked</th>
                            <th>Description</th>
                            <th>Response</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($queries as $query)
                    <tr>
                        <td>{{++$count}}</td>
                        <td>{{$query->rollNo}}</td>
                        <td>{{$query->created_at}}</td>
                        <td>
                            <textarea disabled class="form-control verticalAlign" rows="4">{{$query->description}}</textarea>
                        </td>
                        <form action="/teachers/studentQueries" method="POST" role="form">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="hidden" name="rollNo" value="{{$query->rollNo}}">
                            <input type="hidden" name="courseCode" value="{{$query->courseCode}}">
                            <input type="hidden" name="created_at" value="{{$query->created_at}}">
                            <td>
                                <textarea name="response" class="form-control verticalAlign" rows="4" placeholder="Write explanation here">{{$query->response}}</textarea>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm" type="submit" onclick="return confirm('Are you sure?')">
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
@endsection
