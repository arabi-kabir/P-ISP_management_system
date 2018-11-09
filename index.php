
<?php
    include "backend/new_message.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/page_css/index.css">

    <title>Example ISP</title>
</head>
<body>
    <div id="full-page">

        <section id="section-header">
            <div class="container"> 
                <div class="menu">
                    <a href="#"><img src="image/logo/site_logo.png"></a>
                    <div class="main-menu">
                        <ul>
                            <li><a href="#head-body">Home</a></li>
                            <li><a href="#about_us">about us</a></li>
                            <li><a href="#service">service</a></li>
                            <li><a href="#plan">package</a></li>
                            <li><a href="#contact-us">contact</a></li>
                            <a class="btn btn-outline-success" id="btn_a" href="page/admin_login.php"><li id="portalBtn">Portal</li></a>                              
                        </ul>
                        
                    </div>
                </div>
            </div>     
            <div id="head-body" class="header-image">
                <div class="head-text">
                    <h1>we are daylite service provider</h1>
                    <h2>Fastest Internet service provider in town</h2>
                </div>
            </div>
        </section>

        <section id="about_us">
            <div class="container" id="about_us_data">
                <h1>About Us</h1>
                <p>
                    Where does it come from?
                    Contrary to popular belief, Lorem Ipsum is not simply random text. 
                    It has roots in a piece of classical Latin literature from 45 BC, 
                    making it over 2000 years old. Richard McClintock, a Latin professor at 
                    Hampden-Sydney College in Virginia, looked up one of the more obscure 
                    Latin words, consectetur, from a Lorem Ipsum passage, and going through 
                    the cites of the word in classical literature, discovered the undoubtable 
                    source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus
                    Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
                    This book is a treatise on the theory of ethics, very popular during the Renaissance. 
                    The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                </p>
            </div>
            
        </section>

        <section class="container-fluid" id="plan">
            <h1>Our Package Details</h1>
            <div class="row" id="row-1">
                <div class="col-3 package-info single-plan">
                    <div class="">
                        <h3>Basic</h3>
                        <p class="plan-price">500.TK <span>/ month</span></p>
                    </div>
                    <div class="">
                        <ul>
                            <li>1 mbps</li>
                            <li>BDIX 10GB Connected</li>
                            <li>24/7 Support</li>
                            <li>Online Gaming Zone</li>
                        </ul>
                    </div>
                </div>

                <div class="col-3 package-info single-plan">
                    <div class="">
                        <h3>Medium</h3>
                        <p class="plan-price">1000.TK <span>/ month</span></p>
                    </div>
                    <div class="">
                        <ul>
                            <li>2 mbps</li>
                            <li>BDIX 10GB Connected</li>
                            <li>24/7 Support</li>
                            <li>Online Gaming Zone</li>
                        </ul>
                    </div>
                </div>

                <div class="col-3 package-info single-plan">
                    <div class="">
                        <h3>Professional</h3>
                        <p class="plan-price">2000.TK <span>/ month</span></p>
                    </div>
                    <div class="">
                        <ul>
                            <li>3 mbps</li>
                            <li>BDIX 10GB Connected</li>
                            <li>24/7 Support</li>
                            <li>Online Gaming Zone</li>
                            <li>Plex for Smart TV & PC</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row" id="row-1">
                <div class="col-3 package-info single-plan">
                    <div class="">
                        <h3>Advanced</h3>
                        <p class="plan-price">2500.TK <span>/ month</span></p>
                    </div>
                    <div class="">
                        <ul>
                            <li>4 mbps</li>
                            <li>BDIX 10GB Connected</li>
                            <li>24/7 Support</li>
                            <li>Online Gaming Zone</li>
                            <li>Plex for Smart TV & PC</li>
                        </ul>
                    </div>
                </div>

                <div class="col-3 package-info single-plan">
                    <div class="">
                        <h3>Premium</h3>
                        <p class="plan-price">4000.TK <span>/ month</span></p>
                    </div>
                    <div class="">
                        <ul>
                            <li>8 mbps</li>
                            <li>BDIX 10GB Connected</li>
                            <li>24/7 Support</li>
                            <li>Online Gaming Zone</li>
                            <li>Plex for Smart TV & PC</li>
                        </ul>
                    </div>
                </div>

                <div class="col-3 package-info single-plan">
                    <div class="">
                        <h3>Corporate</h3>
                        <p class="plan-price">???? TK <span>/ month</span></p>
                    </div>
                    <div class="">
                        <ul>
                            <li>? mbps</li>
                            <li>BDIX 10GB Connected</li>
                            <li>24/7 Support</li>
                            <li>Online Gaming Zone</li>
                            <li>Plex for Smart TV & PC</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="service">
            <div class="container">
                <div class="service-top">
                    <h1>SERVICES WE PROVIDE</h1>
                    <div class="border"></div>
                    <p>We are working with both individuals and businesses from all over the globe to create awesome websites and applications.</p>
                </div>
                <div class="service-bottom row">
                    <div class="product1 col-3">
                        <img src="image/icon/icon1.png">
                        <h2>branding</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>
                    </div>
                    <div class="product1 col-3">
                        <img src="image/icon/icon2.png">
                        <h2>design</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>
                    </div>
                    <div class="product1 col-3">
                        <img src="image/icon/icon3.png">
                        <h2>development</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>
                    </div>
                    <div class="product1 col-3">
                        <img src="image/icon/icon4.png">
                        <h2>rocket science</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact-us">
            <div id="contact-us-data" class="container">
                <h1>contact us</h1>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
                <form class="row" action="index.php" method="POST">
                    <div class="col-6">
                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                        <input type="email" name="email" class="form-control" placeholder="Your E-mail address">
                        <input type="tel" name="phone" class="form-control" placeholder="Your Contact Number">
                    </div>
                    <div class="col-6">
                        <textarea placeholder="Your message" name="messgae" class="form-control"></textarea>
                    </div>
                    <button type="submit" name="sendBtn" class="btn btn-outline-success">Send</button>
                </form>
            </div>
        </section>

        <section id="footer">
            <p>2018 Daylight. All rights reserved.</p>
        </section>
        
    </div>

    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>