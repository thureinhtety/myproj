@extends('layouts.app')
@section('content')
<div class="container ml-5">
    <h2>Create User</h2>
    <form action="{{ url('/users/confirmation') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label><span class="required text-danger">*</span>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                @error('name')
                <p class="help is-danger">{{$errors->first('name')}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email Address</label><span class="required text-danger">*</span>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                @error('email')
                <p class="help is-danger">{{$errors->first('email')}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label><span class="required text-danger">*</span>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                @error('password')
                <p class="help is-danger">{{$errors->first('password')}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Confirm Password</label><span class="required text-danger">*</span>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" value="{{old('confirmpassword')}}">
                @error('confirmpassword')
                <p class="help is-danger">{{$errors->first('confirmpassword')}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Type</label><span class="required text-danger">*</span>
            <div class="form-group col-sm-5">
                <select id="inputState" class="form-control" name="type">
                    <option value="Admin" <?php if (old('type') == 'Admin') {
                                                echo ' selected="selected"';
                                            } ?>>Admin</option>
                    <option value="User" <?php if (old('type') == 'User') {
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
                <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" id="dob" name="dob" value="{{old('dob')}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="address" id="address">{{old('address')}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Profile</label><span class="required text-danger">*</span>
            <div class="btn btn btn-outline-secondary col-sm-5">
                <input id="file-upload" type="file" id="profile" name="profile" accept="image/*" onchange="readURL(this);">
                <label for="file-upload" id="file-drag">
                    <img id="blah" width="300px" height="180px" />
                </label>
                @error('profile')
                <p class="help is-danger">{{$errors->first('profile')}}</p>
                @enderror
            </div>
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
        document.getElementById('password').value = '';
        document.getElementById('confirmpassword').value = '';
        document.getElementById('phone').value = '';
        document.getElementById('dob').value = '';
        document.getElementById('address').value = '';
        document.getElementById('profile').value = '';
    }
</script>
@endsection