@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Create Post</h2>
    <form method="post" action="{{url('/changes')}}">
        @csrf
        <div class="form-group">
            <label>Old Password</label><span class="required text-danger">*</span>
            <input type="password" name="old_password" id="old_password" class="col-sm-5 form-control input @error('old_password') is-danger @enderror">
            @error('old_password')
            <p class="help is-danger">{{$errors->first('old_password')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label>New Password</label><span class="required text-danger">*</span>
            <input type="password" name="new_password" id="new_password" class="col-sm-5 form-control input @error('new_password') is-danger @enderror">
            @error('new_password')
            <p class="help is-danger">{{$errors->first('new_password')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label>Confirm New Password</label><span class="required text-danger">*</span>
            <input type="password" name="confirm_new_password" id="confirm_new_password" class="col-sm-5 form-control input @error('confirm_new_password') is-danger @enderror">
            @error('confirm_new_password')
            <p class="help is-danger">{{$errors->first('confirm_new_password')}}</p>
            @enderror
        </div>
        <input type="submit" value="Change" class="btn btn-primary">
        <a href="#" class="btn btn-primary" role="button" onclick="remove()">Clear</a>
    </form>
</div>
<script>
    function remove() {
        document.getElementById('old_password').value = '';
        document.getElementById('new_password').value = '';
        document.getElementById('confirm_new_password').value = '';
    }
</script>
@endsection