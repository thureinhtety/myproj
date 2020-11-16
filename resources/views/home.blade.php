@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <h2>Post List</h2>
            <div class="mb-2">
                <form action="/" method="GET">
                    <input type="text" name="post" class="mr-4">
                    <a class="btn btn-primary mr-3" href="#" role="button">Search</a>
                    <a class="btn btn-primary mr-3" href="/create" role="button">Add</a>
                    <a class="btn btn-primary mr-3" href="#" role="button">Upload</a>
                    <a class="btn btn-primary mr-3" href="#" role="button">Download</a>
                </form>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Post Title</th>
                        <th scope="col">Post Description</th>
                        <th scope="col">Posted User</th>
                        <th scope="col">Posted Date</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if($posts->count() == 0)
                    <tr>
                        <td colspan="6" class="text-center">No data available!!</td>
                    </tr>
                    @endif

                    @foreach($posts as $post)
                    <tr>
                        <td><a href="{{ url("/home/$post->id") }}" data-toggle="modal" data-target="#exampleModalCenter">{{$post->title}}</a></td>
                        <td>{{$post->description}}</td>
                        <td>User-{{$post->create_user_id}}</td>
                        <td>{{$post->created_at}}</td>
                        <td><a href="#">Edit</a></td>
                        <td><a href="{{ url("/delete/$post->id") }}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->links()}}
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Post Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>title</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>description</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>status</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>created at</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>created user</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>last update at</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>updated user</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection