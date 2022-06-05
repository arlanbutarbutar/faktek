<?php 
  $conn=mysqli_connect("localhost","root","","faktek");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}