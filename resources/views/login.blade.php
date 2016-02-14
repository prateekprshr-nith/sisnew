@extends('master')

@section('content')
    <div class="col-md-4"></div>
    <form role="form" class="col-md-4" action="/home" method="post">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd">
        </div>
        <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection