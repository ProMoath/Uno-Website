<?php
    $host="localhost";
    $usenamer="root";
    $password="";
    $dbname="uno+";

    try
    {
        $connection= new PDO("mysql:host=$host;dbname=$dbname",
        $usenamer,$password);

        //set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo "<script>alert('Connected Succesfully') </script>";
    }
    catch(PDOException $e)
    {
         error_log($e->getMessage());
        $error['database'] = "An unexpected error occurred. Please try again later."; 
    //    echo "<script>alert('Connection Failed:{$e->getMeesage()}')</script>";
    }

    ?>