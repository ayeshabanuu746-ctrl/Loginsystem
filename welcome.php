<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
header("location: login.php");
exit;
}

?>

<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Welcome</title>

</head>

<body>

<?php require 'partials/_nav.php' ?>

<div class="container my-3">
<div class="alert alert-success" role="alert">

<h4 class="alert-heading">
Welcome - <?php echo $_SESSION['username']?>
</h4>

<p>You are logged in</p>

<hr>

<p class="mb-0">
<a href="/loginsystem/logout.php">Logout</a>
</p>

</div>
</div>

</body>
</html>