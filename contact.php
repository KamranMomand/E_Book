<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "links.php" ?>
    <link rel="stylesheet" href="assets/css/nav.css"/>
</head>
<body id="top-header" data-background="dark" class="dark-theme">
    <?php include "header.php" ?>
        <!-- Contact Start-->
<section class="section-padding contact dark-bg" id="contact">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-8">
                <div class="section-heading center-heading text-center mb-60">
                    <h3 class="heading-title">Contact with Author</h3>
                    <p>This book is concerned with creating typography and is essential for professionals who regularly work for clients.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12 col-md-12">
                <form class="contact__form form-row contact-form " method="post" action="http://themeturn.com/tf-db/bookhunt/bookhunt/mail.php" id="contactForm">
                     <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                        </div>
                    </div>

                 
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name">
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email Address">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea id="message" name="message" cols="30" rows="6" class="form-control" placeholder="Your Message"></textarea>    
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="d-lg-flex justify-content-between mt-4">
                            <p>* Rest assured. We will not spam at your inbox.</p>
                            <input id="submit" name="submit" type="submit" class="btn btn-dark-bg" value="Send Message">
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</section>
<!-- Contact End -->        

    <?php include "footer.php" ?>
<?php include "script.php" ?>
</body>
</html>