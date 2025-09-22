<?php
    function TestData($data)
    {
        return (stripcslashes(trim($data)));
    }
    function validate(&$error)
    {
     // Name Validation
        if(empty($_POST['name']))
            $error['name'] = "Name is required!";
        else if(!preg_match("/^[a-zA-Z-' ]*$/", $_POST['name']))
            $error['name'] = "Name is NOT in correct form!";
        else
            $_POST['name'] = TestData($_POST['name']);

        // Email Validation
        if(empty($_POST['email']))
            $error['email'] = "Email is required!";
        else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            $error['email'] = "Email is NOT in correct form!";
        else
            $_POST['email'] = TestData($_POST['email']);

        //Number Validatin
        if(empty($_POST['tNumber']))
            $error['tNumber']="Phone Number is requirded!";
        else if(!preg_match("/^[0-9]*$/",$_POST['tNumber']))
            $error['tNumber']="Please Enter a number";
        else
            $_POST['tNumber']=TestData($_POST['tNumber']);

        // Messages Secure
            $_POST['subject'] = TestData($_POST['subject']);
            $_POST['message'] = TestData($_POST['message']);
        
    }
?>