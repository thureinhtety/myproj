@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Upload CSV File</h2>
    <form method="post" action="{{url("/import")}}" class="border p-3" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-6">
            <label for="exampleFormControlFile1">Import File Form :</label>
            <input type="file" name="import_file" class="form-control-file input @error('import_file') is-danger @enderror" id="exampleFormControlFile1">
            @error('import_file')
            <p class="help is-danger">{{$errors->first('import_file')}}</p>
            @enderror
            <input type="submit" value="Import File" class="btn btn-primary mt-3">
        </div>
    </form>
</div>

@endsection