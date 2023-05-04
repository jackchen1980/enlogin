<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Custom Authentication</title>
</head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 20px">
        <h4>Registration</h4>
        <hr>
          <form action="{{Route('registerUser')}}" method="post">
            @if(Session::has('success'))
            <div class="alart alart-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alart alart-fail ">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" placeholder="Enter Full Name"
              name="name" value="{{old('name')}}">
              <span class="text-danger">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="Email">Email</label>
              <input type="text" class="form-control" placeholder="Enter your Email"
              name="email" value="{{old('email')}}">
              <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <input type="text" class="form-control" placeholder="Enter Your Password"
              name="password" value="">
              <span class="text-danger">@error('password'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
             <button class="btn btn-block btn-primary" type="submit">Register</button>
            </div>
            <br>
            <a href="login">Already Register!!Login Here.</a>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>