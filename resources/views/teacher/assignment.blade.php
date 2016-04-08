@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-book"></span>
                        <strong>
                            {{$assignments[0]->courseCode}},
                            #{{$assignments[0]->number}}</span>,
                            Title: {{$assignments[0]->title}}
                        </strong>
                    </div>

                    <div class="panel-body">
                        <textarea disabled class="form-control verticalAlign" rows="20">{{$assignments[0]->description}}</textarea>
                    </div>
                    <div class="panel-footer text-right">
                        <a href="/teachers/assignments" class="btn-primary btn-sm">
                            <span class="glyphicon glyphicon-backward"></span> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection