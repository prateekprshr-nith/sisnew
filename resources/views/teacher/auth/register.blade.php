@extends('layouts.app')

@section('content')

    <div class="container" style>

        <div class="row">
            <div class="col-md-8 col-md-offset-2" >
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong><h3>   Teacher  Registration Portal </h3></strong>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="/teachers/register">
                            {{ csrf_field() }}
                            @include('common.errors')

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="facultyId"> Teacher ID :</label>
                                <div class="col-md-5 control-label">
                                    <span class="col-xs-1 col-xs-offset-1 glyphicon glyphicon-pencil"></span>
                                   <input required-type="text" name="facultyId" size="25px">
                                </div>

                                <label class="col-md-4 control-label" for="name"> Name :</label>
                                <div class="col-md-5 control-label">
                                    <span class="col-xs-1 col-xs-offset-1 glyphicon glyphicon-user"></span>
                                    <input required-type="text" name="name" size="25px">
                                </div>

                              <!--  <label class="col-md-4 control-label" for="dcode"> Department Code</label>
                                <div class="col-md-5 control-label">
                                    <input required-type="text" name="Dept" size="25px">
                                </div> -->
                                <label class="col-md-4 control-label" for="dcode"> Department Code</label>
                                    <div class="col-md-5 control-label dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Department Code
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-header">Department Code</li>
                                            <li><a href="#">CSED</a></li>
                                            <li><a href="#">MED</a></li>
                                            <li><a href="#">ECED</a></li>
                                            <li><a href="#">EEED</a></li>
                                            <li><a href="#">CED</a></li>
                                            <li><a href="#">CHED</a></li>
                                            <li><a href="#">ARCH</a></li>
                                        </ul>
                                    </div>

                                <label class="col-md-4 control-label" for="email"> Email ID :</label>
                                <div class="col-md-5 control-label">
                                    <span class="col-xs-1 col-xs-offset-1 glyphicon glyphicon-envelope"></span>
                                    <input required-type="text" name="email" size="25px">
                                </div>

                                <label class="col-md-4 control-label" for="office"> Office Contact No :</label>
                                <div class="col-md-5 control-label">
                                    <span class="col-xs-1 col-xs-offset-1 glyphicon glyphicon-phone-alt"></span>
                                    <input required-type="text" name="office" size="25px">
                                </div>

                                <label class="col-md-4 control-label" for="password"> Password :</label>
                                <div class="col-md-5 control-label">
                                    <input type="password" name="password" size="25px">
                                </div>

                                <label class="col-md-4 control-label" for="password"> Confirm Password :</label>
                                <div class="col-md-5 control-label">
                                    <span class="col-xs-1 col-xs-offset-1 glyphicon glyphicon-lock"></span>
                                    <input type="password" name="password" size="25px">
                                </div>

                                <label class="col-md-6 control-label" for="submit"></label>
                                <div class="col-md-4 control-label">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit">
                                </div>

                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection