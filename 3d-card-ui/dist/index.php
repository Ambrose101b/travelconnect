<?php
// Check if the 'id' parameter exists in the URL
if(isset($_GET['userid'])) {
    // Retrieve the ID from the URL
    $id = $_GET['userid'];
} else {
    // Set a default value for $id if the 'id' parameter is not present
    $id = "";
}

echo
"<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <title>CodePen - 3d card UI</title>
  <link rel='stylesheet' href='./style.css'>
</head>
<body>
<!-- partial:index.partial.html -->
<div class='container'>
    <div class='box box-1'>
        <div class='cover'><a href='http://localhost/phpscript/airplanes/dist?userid=$id'><img src='http://localhost/phpscript/3d-card-ui/dist/flight.jpeg' alt=''></div>
        <a href='http://localhost/phpscript/01-flighttailwind/dist/index.html?userid=$id'><button><div></div></button></a>
    </div>
    <div class='box box-2'>
        <div class='cover'><a href='http://localhost/phpscript/train404.html?userid=$id'><img src='http://localhost/phpscript/3d-card-ui/dist/train.jpeg' alt=''></div></a>
        <a href='http://localhost/phpscript/book.php?userid=$id'><button><div></div></button></a>
    </div>
    <div class='box box-3'>
        <div class='cover'><a href='http://localhost/phpscript/bulma-coming-soon/dist/index.html?userid=$id'><img src='http://localhost/phpscript/3d-card-ui/dist/bus.jpeg' alt=''></div>
        <button><div></div></button></a>
    </div>
    <div class='box box-4'>
        <div class='cover'><a href='http://localhost/phpscript/bulma-coming-soon/dist/index.html?userid=$id'><img src='http://localhost/phpscript/3d-card-ui/dist/ship.jpeg' alt=''></div>
        <button><div></div></button></a>
    </div>
</div>
<!-- partial -->
</body>
</html>";
?>