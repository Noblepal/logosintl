<?php

include('connection.php');
$table = 'images';

$result = $conn->query("SELECT * FROM $table")or die($conn->error);

while ($row = $result->fetch_assoc()){
    //print_r($row);
    echo "<h2>{$row['name']}</h2>";
    echo "<img src='{$row['dir']}'width='128' height='128'/>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>