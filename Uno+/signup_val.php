<?php
    function TestData($data)
    {
        return stripcslashes(trim($data));
    }
    function validate(&$error)
    {

        // Email Validation
        if(empty($_POST['email']))
            $error['email'] = "Email is required!";
        else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            $error['email'] = "Email is NOT in correct form!";
        else
            $_POST['email'] = TestData($_POST['email']);

    
        //Password Validation
        if(empty($_POST['password']))
            $error['password']="Password is required!";
        else if(strlen($_POST['password']) < 8)
            $error['password']="Password must be at least 8 characters!";
        else
            $_POST['password']=TestData($_POST['password']);

        //Gender Validation
        if(!isset($_POST['gender']))
            $error['gender']="Gender is required!";
        else
            $_POST['gender']=TestData($_POST['gender']);
        
    }
?>