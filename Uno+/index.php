<!DOCTYPE html>
<html lang="en">
    <?php
    include "connection.php";
    
    $error = array();
    if($_SERVER['REQUEST_METHOD']=='POST')
        {
        require "validation.php";
        validate($error);
        if(!empty($_POST))
            {
                if(empty($error))
                    {
                        try{
                            $statement = $connection->prepare(
                                "INSERT INTO contact (Name, Email, Phone, Subject, MESSAGE) VALUES (?, ?, ?, ?, ?)"
                            );
                            $statement->execute([
                                $_POST['name'],
                                $_POST['email'] ,
                                $_POST['tNumber'],
                                $_POST['subject'],
                                $_POST['message']
                            ]);
                            // echo "<script>alert('Thank you for your feed :)')</script>";
                             error_log($e->getMessage());
                            $error['database'] = "An unexpected error occurred. Please try again later."; 
                            $_POST = array(); //to clear the form data
                        }
                        catch(PDOException $e){
                            echo "<script>alert('Error: {$e->getMessage()}')</script>";
                        }
                        echo "<script>window.location.hash = ''</script>";
                    }
                    else
                        echo "<script>window.location.hash = '#form'</script>";
                }
            }
    
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Moath Alshahari">
    <meta name="keywords" content="Digital Games, Digital Subscriptions, Digital Marketing">
    <meta name="description" content="simplifies premium digital subscriptions!">
    <title>UNO Website</title>
    <link rel="stylesheet" href="fontawesome-free-6.7.1-web/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="Images/UnoPlus_Logo.png">
    <script src="script.js"></script>
    
</head>
<body>
    <header class="header">
        <a href="#home" class="logo">UNO+</a>
        
        
        <i id="menu-icon" class="fa-solid fa-bars"></i>
        <nav class="navbar">
        <a href="#home"> Home</a>
        <a href="#services">Services</a>
        <a href="#subscriptions">Subscriptions</a>
        <a href="#contact">Contact</a>
        <a href="signup.php">Sign Up</a>
    </nav>
    </header>
    
    <section class="home" id="home">
        
        <div class="home-image">
            <img src="Images/homepage.PNG" alt="homepageimage">
        </div>

        <div class="home-content">
            <h1>Weclome to <span>UNO+</span></h1>
            <h3 class="typing-text">The best <span></span></h3>
            <p>Uno Plus simplifies premium digital subscriptions! 
                Enjoy services like Snapchat Plus, Canva Pro, Spotify Premium,
                 and more at affordable prices. Experience convenience, reliability,
                  and top-tier access tailored for your needs.</p>
                  <div class="social-icon">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                  </div>
                  <a href="#" class="btn">Check it Out</a>
        </div>
    </section>

    <section class="services" id="services">
        <h2 class="heading">Services</h2>

        <div class="service-container">

            <div class="service-box">
                <div class="service-info">
                    <h4>Graphic Design</h4>
                    <p>Unlock professional graphic design services at Uno Store. 
                        Our creative team delivers custom designs, including logos,
                         banners, and more to elevate your brand identity</p>
                </div>
            </div>

            <div class="service-box">
                <div class="service-info">
                    <h4>Digital Subscriptions</h4>
                    <p>Discover latest digital subscriptions at Uno Plus.
                         Access premium content, stream music, movies. 
                         Enjoy seamless streaming across devices, anywhere, anytime</p>
                </div>
            </div>

            <div class="service-box">
                <div class="service-info">
                    <h4>Digital Marketing</h4>
                    <p>Boost your brand with Uno Store's digital marketing services. 
                        We offer tailored strategies, SEO, social media, and more 
                        to drive growth and visibility.</p>
                </div>
            </div>

            <div class="service-box">
                <div class="service-info">
                    <h4>Paid Ads</h4>
                    <p>Maximize your reach with Uno Store’s paid ads services. 
                        We create targeted campaigns on Google, Facebook, and more 
                        to drive immediate results and growth</p>
                </div>
            </div>

            <div class="service-box">
                <div class="service-info">
                    <h4>Digital Games</h4>
                    <p>Explore a vast collection of digital games at Uno Store. 
                        Get instant access to the latest titles and enjoy seamless
                         gaming experiences at the lowest possible price</p>
                </div>
            </div>

            <div class="service-box">
                <div class="service-info">
                    <h4>Games Top-up</h4>
                    <p>Instantly top up your gaming accounts at Uno Store. 
                        Enjoy seamless transactions and boost your in-game
                         balance for an enhanced gaming experience</p>
                </div>
            </div>

        </div>
    </section>

    <section class="subscriptions" id="subscriptions">
        <h2 class="heading">Subscriptions</h2>
        <div class="container">
            <div class="row" id="subscriptionsContainer">

                <div class="bar">
                    <div class="info">
                        <i class="fa-brands fa-spotify" style="font-size: 5rem; color: rgb(255, 255, 255);"></i>
                        <span>Spotify</span>
                    </div>
                </div>

                <div class="bar">
                    <div class="info">
                        <i class="fa-brands fa-youtube" style="font-size: 5rem; color:rgb(255, 255, 255)"></i>
                        <span>Yotube</span>
                    </div>
                </div>

                <div class="bar">
                    <div class="info">
                        <i class="fa-brands fa-meta" style="font-size: 5rem; color:rgba(255, 255, 255, 0.945)"></i>
                        <span>Meta ads</span>
                    </div>
                </div>

                <div class="bar">
                    <div class="info">
                        <i class="fa-solid fa-tv" style="font-size: 5rem; color:rgba(255, 255, 255, 0.945)"></i>
                        <span>Streaming </span>
                    </div>
                </div>

                <div class="bar">
                    <div class="info">
                        <i class="fa-brands fa-snapchat" style="font-size: 5rem; color:rgb(255, 255, 255)"></i>
                        <span>Snapchat+</span>
                    </div>
                </div>

                <div class="bar">
                    <div class="info">
                        <i class="fa-brands fa-discord" style="font-size: 5rem; color:rgba(255, 255, 255, 0.945)"></i>
                        <span>Discord</span>
                    </div>
                </div>

                <div class="bar">
                    <div class="info">
                        <i class="fa-brands fa-playstation" style="font-size: 5rem; color:rgba(255, 255, 255, 0.945)"></i>
                        <span>PS4 & PS5</span>
                    </div>
                </div>

                <div class="bar">
                    <div class="info">
                        <i class="fa-brands fa-steam" style="font-size: 5rem; color:rgba(255, 255, 255, 0.945)"></i>
                        <span>Steam</span>
                    </div>
                </div>

                <div class="bar">
                    <div class="info">
                        <i class="fa-brands fa-xbox" style="font-size: 5rem; color:rgba(255, 255, 255, 0.945)"></i>
                        <span>Xbox</span>
                    </div>
                </div>

                <div class="bar">
                    <div class="info">
                        <i class="fa-brands fa-google-play" style="font-size: 5rem; color:rgba(255, 255, 255, 0.945)"></i>
                        <span>Google Play</span>
                    </div>
                </div>

                
            </div>
        </div>
    </section>
    
    <section class="contact" id="contact">
        <h2 class="heading">Contact&nbsp;<span>Me</span></h2>
        
        <form method="POST" action="" id="form">
            <div class="input-box">
                <input type="text" name="name" placeholder="Name" id="name" value="<?php echo htmlspecialchars($_POST['name'] ?? '') ?>">    
                <?php if (!empty($error['name'])): ?>
            <p class="error-message"><?= $error['name'] ?></p>
        <?php endif; ?>

                <input type="email" placeholder="Email" name="email" id="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                <?php if(!empty($error['email'])): ?>
                    <p><?=$error['email']?></p>
                    <?php endif; ?>

                <input type="tel" placeholder="Phone number" name="tNumber" id="tNumber" value="<?php echo htmlspecialchars($_POST['tNumber'] ?? '') ?>">
                 <?php
                        if(!empty($error['tNumber']))
                        {
                    ?>
                            <p><?=$error['tNumber']?></p>
                    <?php
                        }
                    ?>
                    
                <input type="text"  placeholder="Subject" name="subject" id="subject" value="<?php echo htmlspecialchars($_POST['subject'] ?? '') ?>">
            </div>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message"><?=htmlspecialchars($_POST['message']?? '')?></textarea>
            <input type="submit" value="Send Message" class="contact-btn">
        </form>
    </section>

    <footer class="footer">
        <div class="social">
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
        <ul class="list">
            <li><a href="#">FAQ</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#home">About</a></li>
            <li><a href="#">Privacy Policies</a></li>
        </ul>
        <p class="copyright">&copy; 2025 Uno Store | All rights reserved.</p>

    </footer>
</body>
</html>