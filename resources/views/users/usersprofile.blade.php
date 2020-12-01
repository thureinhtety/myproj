@extends('layouts.app')
@section('content')
<div class="container" style="position: relative;">
    <h2>User Profile</h2>
    <form>
        @csrf
        <div class="form-group">
            <label>Name : &nbsp;</label>{{ $users->name }}
        </div>
        <div class="form-group">
            <label>Profile</label>
            <img src="{{ url($users->profile) }}" width="150" height="150"/>
        </div>
        <div class="form-group">
            <label>Email Address : &nbsp;</label>{{ $users->email }}
        </div>
        <div class="form-group">
            <label>Type : &nbsp;</label><?php echo ($users->type) == 0 ? 'Admin' : 'User'?>
        </div>
        <div class="form-group">
            <label>Phone : &nbsp;</label>{{ $users->phone }}
        </div>
        <div class="form-group">
            <label>Date of Birth : &nbsp;</label>{{ $users->dob }}
        </div>
        <div class="form-group">
            <label>Address : &nbsp;</label>{{ $users->address }}
        </div>
        <div class="form-group" style="position:absolute;top:10px;right:800px;">
            <a href="/users/edit/{{Auth::user()->id}}">Edit</a>
        </div>
    </form>
</div>
@endsection