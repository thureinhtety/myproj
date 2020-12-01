@extends('layouts.app')
@section('content')
<div class="container ml-5">
    <h2>Update User</h2>
    <form method="POST" action="{{ url('/users/confirmation/'. $user->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label><span class="required text-danger">*</span>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                @error('name')
                <p class="help is-danger">{{$errors->first('name')}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email Address</label><span class="required text-danger">*</span>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                @error('email')
                <p class="help is-danger">{{$errors->first('email')}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Type</label><span class="required text-danger">*</span>
            <div class="form-group col-sm-5">
                <select id="inputState" class="form-control" name="type">
                    <option value="admin" <?php if ($user['type'] == 0) {
                                                echo ' selected="selected"';
                                            } ?>>Admin</option>
                    <option value="user" <?php if ($user['type'] == 1) {
                                                echo ' selected="selected"';
                                            } ?>>User</option>
                </select>
                @error('type')
                <p class="help is-danger">{{$errors->first('type')}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" id="dob" name="dob" value="{{$user->dob}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-5">
                <textarea class="form-control" id="address" name="address">{{$user->address}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Profile</label><span class="required text-danger">*</span>
            <div class="btn btn btn-outline-secondary col-sm-5">
                <input id="file-upload" type="file" id="profile" name="profile" accept="image/*" onchange="readURL(this);">
                <label for="file-upload" id="file-drag">
                    <img src="{{ url($user->profile) }}" id="blah" width="300px" height="180px" />
                </label>
                @error('profile')
                <p class="help is-danger">{{$errors->first('profile')}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <a href="/change" class="col-sm-2 col-form-label">Change Password</a><br>
        </div>
        <input type="submit" value="Confirm" class="btn btn-primary ">
        <a href="#" class="btn btn-primary" role="button" onclick="remove()">Clear</a>
    </form>
</div>
<script>
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function remove() {
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('phone').value = '';
        document.getElementById('dob').value = '';
        document.getElementById('address').value = '';
        document.getElementById('profile').value = '';
    }
</script>
@endsection