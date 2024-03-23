<?php
session_start();

include "../koneksi/koneksi.php";

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  $sql = "SELECT*FROM user WHERE username = '$username' AND password = '$password' ";
  $query = mysqli_query($koneksi, $sql);

  if (mysqli_num_rows($query) > 0) {
    $_SESSION["login"] = $username;
    header("location:../index.php?login=sukses");
  } else {
    header("location:login.php?login=gagal");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1 class="text-center">Login</h1>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
          </div>
          <br>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <br>
          <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>