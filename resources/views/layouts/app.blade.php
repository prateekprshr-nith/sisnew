<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Information System</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/fileinput.min.css" media="all" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/bootstrap/js/jquery.min.js"></script>

    <!-- Java script files -->
    <script src="/bootstrap/js/custom.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/bootstrap/js/fileinput.min.js"></script>
    <script src="/bootstrap/js/plugins/canvas-to-blob.min.js"></script>

    <style>
        textarea.verticalAlign {
            resize: vertical;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar-content">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Student Information System</a>
            </div>

            <div class="collapse navbar-collapse" id="mynavbar-content">

                <!--
                     Get the user. Please note that this code is a
                     bit tricky. Do not try to change it. But
                     if you did try that and failed then
                     increment the counter below :D.

                     No. of hours wasted = 0
                -->

                @if(Auth::guard('student')->user())
                    {{-- */$user= 'student';/* --}}
                @elseif(Auth::guard('teacher')->user())
                    {{-- */$user = 'teacher';/* --}}
                @elseif(Auth::guard('admin')->user())
                    {{-- */$user = 'admin';/* --}}
                @elseif(Auth::guest())
                    {{-- */$user = 'guest';/* --}}
                @endif

                @if($user != 'guest')
                    <ul class="nav navbar-nav navbar-right">

                        @if($user == 'student')
                            <li><a href="/students/home">Home</a></li>
                            <li><a href="/students/performance">View Performance</a></li>
                            <li><a href="/students/attendance">View Attendance</a></li>
                            <li><a href="#">Assignments</a></li>
                            <li><a href="/students/queries">Doubt corner</a></li>
                        @elseif($user == 'teacher')
                            <li><a href="/teachers/home">Home</a></li>
                            <li><a href="/teachers/courses">Teaching Information</a></li>
                            <li><a href="/teachers/studentRecords">Student Records</a></li>
                            <li><a href="#">Assignments</a></li>
                            <li><a href="/teachers/studentQueries">Doubt corner</a></li>
                        @endif

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                @if($user == 'admin')
                                    <strong>
                                        Admin
                                    </strong>
                                @else
                                    @if($user == 'student')
                                        <img src="{{ url('/students/image') }}" id="avatarImage" width="20" height="20"
                                             class="img-rounded" alt="Cinque Terre" onerror="loadAvatarIcon('avatarImage')">
                                    @endif
                                    <strong>
                                        {{Auth::guard($user)->user()->name}}
                                    </strong>
                                @endif
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/{{$user}}s/updateInfo"><span class="glyphicon glyphicon-refresh"></span> Update Profile</a></li>
                                <li><a href="/{{$user}}s/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/students/register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="glyphicon glyphicon-log-in"></span> Login
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/students/login"> Student</a></li>
                                <li><a href="/teachers/login"> Teacher</a></li>
                            </ul>
                        </li>
                    </ul>
                @endif

            </div>
        </div>
    </nav>
</div>

@yield('content')

</body>
</html>