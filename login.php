<?php

$login = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

include 'partials/_dbconnect.php';

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "Select * from users where username='$username'";

$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

if($num == 1){

while($row=mysqli_fetch_assoc($result)){

if(password_verify($password, $row['password'])){

$login = true;
session_start();

$_SESSION['loggedin'] = true;
$_SESSION['username'] = $username;

header("location: welcome.php");

}
else{
$showError = "Invalid Credentials";
}
}

}
else{
$showError = "Invalid Credentials";
}

}
?>

<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Login</title>

</head>

<body>

<?php require 'partials/_nav.php' ?>

<?php

if($login){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> You are logged in
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>';
}

if($showError){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong> '.$showError.'
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>';
}
?>

<div class="container my-4">

<h1 class="text-center">Login to our website</h1>

<form action="/loginsystem/login.php" method="post">

<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" class="form-control" name="username">
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" class="form-control" name="password">
</div>

<button type="submit" class="btn btn-primary">Login</button>

</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>