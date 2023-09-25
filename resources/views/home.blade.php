<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
</head>
<body>
<a href="logout" style="float:right;margin:3px;"><button class="btn btn-danger">Logout</button></a>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Welcome</h2><hr>
                <table class="table">
                    <thead>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td><a href="update"><button class="btn btn-success">Modify</button></a>
                                <a href="delete"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    </tbody>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>