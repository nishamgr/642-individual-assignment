<!DOCTYPE HTML>  
<html>
<head>

    <title>Verification Form</title>
    <!-- Bootstrap -->
    <meta charset="utf-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
    <!-- Custom Stylesheet -->
    <link href="stylesheet.css" rel="stylesheet" type="text/css">

</head>
<body>  
	<center><h1>Verification Form</h1></center>
	<br>
<div class="container center-div">
    <div class="container jumbotron jumbotron-fluid" id="main-container">
        <div class="container center-div">
	<h2>Hello <?php echo $_POST["firstName"]; ?>,</h2><h3> Information you have entered are as follows: </h3><br>
	<div class="row">
		<div class="col-md">
	<div class="row"><b>Full Name:</b> <?php echo $_POST["firstName"]; ?> <?php echo $_POST["lastName"]; ?></div><br>
	<div class="row"><b>Address:</b> <?php echo $_POST["address"]; ?></div><br>
	<div class="row"><b>Phone:</b> <?php echo $_POST["phoneNumber"]; ?></div><br>
	<div class="row"><b>Email</b> <?php echo $_POST["email"]; ?></div><br>
	<div class="row"><b>Title:</b> <?php echo $_POST["title"]; ?></div><br>
	<div class="row"><b>Budget:</b> <?php echo $_POST["monthlyBudget"]; ?></div><br>
	<div class="row"><b>Height:</b> <?php echo $_POST["inches"]; ?></div></div>
    <div class="row"><b>Password:</b> <?php echo $_POST["password"]; ?></div></div>


<?php 

    </script>
 
    <?php
     }else{
        echo "No map found.";
    }
}
?>
</html>