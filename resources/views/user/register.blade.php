<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Registration Form</h2><hr>
                <form action="{{route('register-user')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="name">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="enter full name" name="name" value="{{old('name')}}">
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="enter your email" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" placeholder="enter your password" name="password" value="">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-block btn-primary mt-4" type="submit">Register</button>
                    </div>
                    <br>
                    <a href="login" style="text-decoration:none;">Already registered? Login here</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>