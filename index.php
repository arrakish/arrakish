<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background-image: url("../gambar/kis.jpg"); /* Replace with your image path */
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .container {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 55px;
      border-radius: 300px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 20px;
    }

    button[type="submit"],
    button[type="reset"] {
      width: 90%;
      padding: 10px 20px;
      margin-top: 10px;
      border: none;
      border-radius: 1px;
      cursor: pointer;
    }

    button[type="submit"] {
      background-color:rgb(30, 221, 231); /* Adjust submit button color */
      color: white;
    }

    button[type="reset"] {
      background-color:rgb(255, 1, 1); /* Adjust reset button color */
      color: white;
    }

    /* Optional styling for form elements */
    input[type="text"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color:rgb(221, 36, 209); /* Adjust focus border color */
    }

    .valid-feedback,
    .invalid-feedback {
      display: none; /* Hide feedback by default */
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Form Login</h2>
    <form method="post" action="function.php">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" placeholder="Enter username" name="uname" require>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
        <label for="psw">Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="psw" require>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <button type="submit" class="btn btn-primary" name="login">Submit</button>
      <button type="reset" class="btn btn-warning" name="batal">Batal</button>
    </form>
  </div>

</body>
</html>