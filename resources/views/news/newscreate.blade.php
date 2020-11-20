@extends('layouts.app')
@section('content')
<div class="container ml-5">
    <h2>Create User</h2>
    <form method="get" action="{{url("/news/confirm")}}">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email Address</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="email">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="confirmpassword">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Type</label>
            <div class="form-group col-sm-5">
                <select id="inputState" class="form-control">
                    <option selected></option>
                    <option>Admin</option>
                    <option>User</option>
                    <option>Visitor</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="phone">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="dob">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="dob"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Profile</label>
            <div class="btn btn btn-outline-secondary col-sm-5">
                <input type="file" class="form-control-file">
            </div>
        </div>
        <input type="submit" value="Confirm" class="btn btn-primary ">
        <input type="reset" value="Clear" class="btn btn-primary">
    </form>
</div>

@endsection