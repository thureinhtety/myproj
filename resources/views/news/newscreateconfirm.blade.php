@extends('layouts.app')
@section('content')
<div class="container" style="position: relative;">
    <h2>Create User Confirmation</h2>
    <form method="post" action="{{url("/posts/create")}}">
        @csrf
        <div class="form-group">
            <label>Name : &nbsp;</label>
        </div>
        <div class="form-group">
            <label>Email Address : &nbsp;</label>
        </div>
        <div class="form-group">
            <label>Password : &nbsp;</label>
        </div>
        <div class="form-group">
            <label>Type : &nbsp;</label>
        </div>
        <div class="form-group">
            <label>Phone : &nbsp;</label>
        </div>
        <div class="form-group">
            <label>Date of Birth : &nbsp;</label>
        </div>
        <div class="form-group">
            <label>Address : &nbsp;</label>
        </div>
        <div class="form-group" style="position:absolute;top:10px;right:200px;">
            <label>Profile : &nbsp;</label>
        </div>
        <input type="submit" value="Create" class="btn btn-primary">
        <a class="btn btn-primary" href="/posts/create" role="button">Cancel</a>
    </form>
</div>
@endsection