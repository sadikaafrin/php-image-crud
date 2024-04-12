<?php
session_start();

$connection = mysqli_connect('localhost', "root", "", "image-crud");

if (isset($_POST['save_image']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];

    if(file_exists("uploads/" .$_FILES['image']['name']))
    {
        $filename = $_FILES['image']['name'];
        $_SESSION['status'] = $filename .' '. "Image Already Exsists";
        header('location: index.php');
    }
    else
    {
        $insert_image_query = "INSERT INTO students(name, phone, email, image) VALUES ('$name', '$phone', '$email', '$image')";
        $insert_image_query_run = mysqli_query($connection, $insert_image_query);
    
        if ($insert_image_query_run)
        {
            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$_FILES['image']['name']);
            $_SESSION['status'] = "Image stored successfully";
            header('location: home.php');
        }
        else
        {
            $_SESSION['status'] = "Image not stored successfully";
            header('location: index.php');
        }
    }    
}
?>