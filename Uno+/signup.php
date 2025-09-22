<!DOCTYPE html>
<html lang="en">
    <?php
        include "connection.php";
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="signup-container">
        <div class="signup-wrapper">
              <?php
            $error = array();
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                include "signup_val.php";
                validate($error);
                if(!empty($_POST))
                    {
                        if(empty($error))
                            {
                                try{                                
                                    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                    $statement = $connection->prepare(
                                        "INSERT INTO users (Email, Password, Gender) VALUES (?, ?, ?)"
                                    );
                                    $statement->execute([
                                        $_POST['email'] ,
                                        $hashed_password,
                                        $_POST['gender'],
                                    ]);
                                    echo "<script>alert('You have signed up successfully :)'); window.location.href='index.php';</script>";
                                }
                                catch(PDOException $e){
                                    error_log($e->getMessage());
                                    $error['database'] = "An unexpected error occurred. Please try again later."; 
                                    //  <script>alert('Error: {$e->getMessage()}')</script>";

                                }
                                echo "<script>window.location.hash = ''</script>";
                            }
                            else
                                echo "<script>window.location.hash = '#form'</script>";
                        }
                    }
            
        ?>
            <form class="signup-form" method="POST" action="">
                <h1>Sign Up</h1>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">
                    
                    <?php if(!empty($error['email'])): ?>
                    <p><?=$error['email']?></p>
                    <?php endif; ?>

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                    
                    <?php if(!empty($error['password'])): ?>
                    <p><?=$error['password']?></p>
                    <?php endif; ?>

                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div>
                        <input type="radio" id="male" name="gender" value="1" <?php if(($_POST['gender'] ?? '') === "1") echo 'checked'; ?> >
                        <label for="male">Male</label>
                    </div>
                    <div>
                        <input type="radio" id="female" name="gender" value="0" <?php if(($_POST['gender'] ?? '') === "0") echo 'checked'?> >
                        <label for="female">Female</label>
                    </div>
                    <?php if(!empty($error['gender'])): ?>
               <p><?=$error['gender']?></p>
               <?php endif; ?>
                </div>
                <button type="submit" class="login1-btn">Sign Up</button>
                <button type="button" class="login-btn" onclick="window.location.href='index.php'">Go Back</button>
            </form>
        </div>
    </div>
</body>
</html>
