<?php 
  // $conn=mysqli_connect("localhost","gaslvldx_netmedia","Itha040700_","gaslvldx_faktek");
  $conn=mysqli_connect("localhost","root","","faktek");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}