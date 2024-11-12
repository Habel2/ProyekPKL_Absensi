<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <style>
    body{
      background: url('img/login.jpeg') no-repeat;
      background-size:cover;
    }
    .halaman{
      display:flex;
    }
    .navigasi{
      position:absolute;
      width:100%;
      font-size: 20px;
      background-color: rgba(0, 0, 0, 0.8); 
    }
    .container{
      position:absolute;
      padding:20px;
      border:1px solid;
      margin-top:15%;
      margin-left:25%;
      width:50%;
      background:rgba(0, 0, 0, 0.8);
    }
    label{
      color:aliceblue;
    }
    footer{
      color:white;
      background:black;
      width:100%;
      text-align:center;
      margin-top:47%;
    }
  </style>
  <body>
    <div class="halaman">
      <!-- Navigasi -->
      <div class="navigasi">
        <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
        </nav>
      </div>
      <!-- Form -->
      <div class="container rounded">
        <form method="POST" action="login_proses.php" class="form">
          <div class="form-group">
            <label>Username</label>
            <input name="username" type="text" class="form-control" placeholder="Masukkan username disini">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" placeholder="Masukkan password disini">
          </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>