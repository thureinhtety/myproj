@extends('layouts.app')
@section('content')
<div class="container" style="position: relative;">
    <h2>Create User Confirmation</h2>
    <form method="post" action="{{url('/users/create')}}">
        @csrf
        <div class="form-group">
            <label>Name : &nbsp;</label>{{ $userConfirm->name }}
        </div>
        <div class="form-group">
            <label>Email Address : &nbsp;</label>{{ $userConfirm->email }}
        </div>
        <div class="form-group">
            <label>Type : &nbsp;</label>{{ $userConfirm->type }}
        </div>
        <div class="form-group">
            <label>Phone : &nbsp;</label>{{ $userConfirm->phone }}
        </div>
        <div class="form-group">
            <label>Date of Birth : &nbsp;</label>{{ $userConfirm->dob }}
        </div>
        <div class="form-group">
            <label>Address : &nbsp;</label>{{ $userConfirm->address }}
        </div>
        <div class="form-group" style="position:absolute;top:10px;right:200px;">
            <img src="{{ url($userConfirm->profile) }}" width="150" height="150"/>
        </div>
        <input type="submit" value="Create" class="btn btn-primary">
        <a class="btn btn-primary" href="/users/create" role="button">Cancel</a>
    </form>
</div>
@endsection