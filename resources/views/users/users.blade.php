@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <h2>User List</h2>
            <div class="mb-2">
                <form action="{{url('/users/search')}}" method="GET">
                    <input type="text" name="name" class="mr-3" placeholder="Name">
                    <input type="text" name="email" class="mr-3" placeholder="Email">
                    <input type="text" name="created_from" class="mr-3" placeholder="Created From">
                    <input type="text" name="created_to" class="mr-3" placeholder="Created To">
                    <input type="submit" value="Search" class="btn btn-primary mr-3">
                    @auth
                    <a class="btn btn-primary mr-3" href="/users/create" role="button">Add</a>
                    @endauth
                </form>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created User</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Address</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Updated Date</th>
                        @auth
                        <th scope="col"></th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @if($news->count() == 0)
                    <tr>
                        <td colspan="9" class="text-center">No data available!!</td>
                    </tr>
                    @endif

                    @foreach($news as $new)
                    <tr>
                        <td><a href onclick="showDetail({{json_encode($new)}})" data-toggle="modal" data-target="#exampleModal">{{$new->name}}</a></td>
                        <td>{{$new->email}}</td>
                        <td>User-{{$new->create_user_id}}</td>
                        <td>{{$new->phone}}</td>
                        <td>{{$new->dob}}</td>
                        <td>{{$new->address}}</td>
                        <td>{{$new->created_at}}</td>
                        <td>{{$new->updated_at}}</td>
                        @auth
                        <td>
                            <form method="post" onsubmit="return confirm('Are you sure to delete this post?')" action="{{ url('/users/delete/'.$new->id) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                        @endauth
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $news->links()}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 160%;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">User Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Name</td>
                                        <td id="name"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Email</td>
                                        <td id="email"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Password</td>
                                        <td id="password"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Type</td>
                                        <td id="type"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Phone</td>
                                        <td id="phone"></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Address</td>
                                        <td id="address"></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Date of Birth</td>
                                        <td id="dob"></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Created User</td>
                                        <td id="cu"></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Created At</td>
                                        <td id="ca"></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Updated User</td>
                                        <td id="uu"></td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Last Updated At</td>
                                        <td id="ua"></td>
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
        function showDetail(newemp) {
            document.getElementById("name").innerHTML = newemp.name;
            document.getElementById("email").innerHTML = newemp.email;
            document.getElementById("password").innerHTML = newemp.password;
            document.getElementById("type").innerHTML = newemp.type;
            document.getElementById("phone").innerHTML = newemp.phone;
            document.getElementById("address").innerHTML = newemp.address;
            document.getElementById("dob").innerHTML = newemp.dob;
            document.getElementById("cu").innerHTML = newemp.create_user_id;
            document.getElementById("ca").innerHTML = setDate(newemp.created_at);
            document.getElementById("uu").innerHTML = newemp.updated_user_id;
            document.getElementById("ua").innerHTML = setDate(newemp.updated_at);
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