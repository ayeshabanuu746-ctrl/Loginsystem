<?php

$showAlert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

include 'partials/_dbconnect.php';

$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

$exists=false;

if(($password == $cpassword) && $exists==false){

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";

    $result = mysqli_query($conn, $sql);

    if($result){
        $showAlert = true;
    }
}
else{
    $showError = "Passwords do not match";
}
}
?>

<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Signup</title>

</head>

<body>

<?php require 'partials/_nav.php' ?>

<?php

if($showAlert){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> Your account is now created and you can login.
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

<h1 class="text-center">Signup to our website</h1>

<form action="/loginsystem/index.php" method="post">

<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" class="form-control" name="username">
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" class="form-control" name="password">
</div>

<div class="mb-3">
<label class="form-label">Confirm Password</label>
<input type="password" class="form-control" name="cpassword">
</div>

<button type="submit" class="btn btn-primary">Signup</button>

</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>