@extends('layouts.app')

@section('content')

<form class="ml-5" method="post" action="/login/check" enctype="multipart/form-data">
    @csrf
    <h1>Login</h1>
    <div class="form-group row">
        <div class="col-sm-5">
            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email...">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-5">
            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password...">
        </div>
    </div>
    <input type="submit" value="Login" class="btn btn-primary">
    <p class="sign-up">Don't have an Account?<a href="/news/create"> Create User</a></p>
</form>
@endsection