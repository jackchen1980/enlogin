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
        <h4>Welcome to dashboard</h4>
        <hr>
          <table class="table">
          <thead>
            <th>name</th>
            <th>email</th>
            <th>Action</th>
          </thead>
          <tbody>
            <tr>
              <td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
              <td><a href="logout">logout</a></td>
            </tr>
          </tbody> 
          </table>
        </div>
      </div>
    </div>
  </body>
</html>