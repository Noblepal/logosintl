<?php

include('connection.php');
$table = 'images';
//Handle file upload button clicked


$errors = array(
    0=> 'There is no error, the file is uploaded successfully',
    1=> 'The uploaded file exceeds the maximum upload limit',
    2=> 'The uploaded file exceeds the MAX_FILE_SIZE directive',
    3=> 'The uploaded file was only partially uploaded',
    4=> 'No file was uploaded',
    5=> 'Missing a temporary folder',
    6=> 'Failed to write to disk',
    7=>'A PHP extension stopped the file upload'
);

if(isset($_POST['upload'])){
    if(isset($_FILES['img_file'])){
        $file_array = reArrayFiles($_FILES['img_file']);

        for ($i=0; $i < count($file_array); $i++) { 
            if($file_array[$i]['error']){
                ?>
                    <div class="alert alert-danger">
                        <?php echo $file_array[$i]['error']. '-' .$errors[$file_array[$i]['error']]?>
                    </div>
                <?php
            } else {
                $extensions = array('jpg','png','gif','jpeg');

                $file_ext = explode('.',$file_array[$i]['name']);

                $name = $file_ext[0];
                $name = preg_replace('!_|-!',' ',$name);
                $name = ucwords($name);
                //pre_r($file_ext);die;

                $file_ext = end($file_ext);

                if(!in_array($file_ext, $extensions)){
                    ?>
                        <div class="alert alert-danger">
                            <?php echo "{$file_array[$i]['name']} - Oops, that was not an image!";?>
                        </div>
                    <?php
                } else {

                    $img_dir = 'uploads/'.$file_array[$i]['name'];

                    move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);

                    $sql = "INSERT IGNORE INTO $table(name, dir) VALUES('$name','$img_dir')";
                    $conn->query($sql) or die($conn->error) ;

                    ?>
                        <div class="alert alert-success">
                            <?php echo $file_array[$i]['name'].' - '.$errors[$file_array[$i]['error']];?>
                        </div>
                    <?php
                }
            }
        }
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Upload image PHP</title>
</head>
<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="img_file[]" value="" multiple=""/>
        <input type="submit" name="upload" value="Upload"/>
    </form>
    
</body>
</html>