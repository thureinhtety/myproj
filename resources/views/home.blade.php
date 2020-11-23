@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2>Post List</h2>
            <div class="mb-2">
                <form action="/posts" method="GET">
                    <input type="text" name="post" class="mr-4">
                    <input type="submit" value="Search" class="btn btn-primary mr-3">
                    <a class="btn btn-primary mr-3" href="/posts/create" role="button">Add</a>
                    <a class="btn btn-primary mr-3" href="/upload" role="button">Upload</a>
                    <a class="btn btn-primary mr-3" href="/download" role="button">Download</a>
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
                        <td><a href onclick="showDetail({{json_encode($post)}})" data-toggle="modal" data-target="#exampleModal">{{$post->title}}</a></td>
                        <td>{{$post->description}}</td>
                        <td>User-{{$post->create_user_id}}</td>
                        <td>{{$post->created_at}}</td>
                        <td><a href="{{url("/posts/edit/$post->id")}}">Edit</a></td>
                        <td>
                            <form method="post" onsubmit="return confirm('Are you sure to delete this post?')" action="{{ url("/posts/delete/$post->id") }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Post Detail</h5>
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
                                        <td id="title"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>description</td>
                                        <td id="description"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>status</td>
                                        <td id="status"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>created at</td>
                                        <td id="ca"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>created user</td>
                                        <td id="cu"></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>last update at</td>
                                        <td id="ua"></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>updated user</td>
                                        <td id="uu"></td>
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


    <script>
        function showDetail(post) {
            document.getElementById("title").innerHTML = post.title;
            document.getElementById("description").innerHTML = post.description;
            document.getElementById("status").innerHTML = post.status;
            document.getElementById("ca").innerHTML = setDate(post.created_at);
            document.getElementById("cu").innerHTML = post.create_user_id;
            document.getElementById("ua").innerHTML = setDate(post.updated_at);
            document.getElementById("uu").innerHTML = post.updated_user_id;
        }
        function setDate(date){
            var timestamp = new Date(date).getTime();
            var todate = new Date(timestamp).getDate();
            var tomonth = new Date(timestamp).getMonth() + 1;
            var toyear = new Date(timestamp).getFullYear();
            var original_date = toyear + '-' + tomonth + '-' + todate;
            return original_date;
        }
    </script>
    @endsection