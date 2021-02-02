<?php
    $email_sent = false;

    if(isset($_POST['email']) && $_POST['email'] != ''){
       
        if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
            // sumbit the form

            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $userMobile = $_POST['mobile'];
            $messageSubject = $_POST['subject'];
            $message = $_POST['message'];

            $to = "gisgurgaon2020@gmail.com";
            $headers = 'From: Admision@gemsedu.in'. "\r\n";
            $emailSubject = "GIS Admission Enquiry: ". $messageSubject;
            $body = "";


            $body .= "From: ".$userName. "\r\n";
            $body .= "Email: ".$userEmail. "\r\n";
            $body .= "Mobile: ".$userMobile. "\r\n";
            $body .= "Subject: ".$messageSubject. "\r\n";
            $body .= "Message: ".$message. "\r\n";

            mail($to, $emailSubject, $body, $headers);
            
            $email_sent = true;
        }
        else{
            $invalid_class_name = "form-invalid";
        }
    }
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GEMS International School</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        
        <script>history.pushState({}, ", ")</script>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
         <!-- Navigation-->
         <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container-fluid">
                <a class="navbar-brand js-scroll-trigger" href="index.html"><img class="logo1" src="assets/img/gems-icon.png" alt="Gems-Logo"/>GEMS International School</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <img class="img-hamburger" src="assets/img/menu.svg" alt="menu"/>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                      
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.html">Home</a>
                </li>
                        
                <li class="nav-item"><a class="nav-link js-scroll-trigger">Why GEMS</a>
                <!--new menu item drop down test-->
                <div class="dropdown">
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="gems-learner-profile.html">Gems Learner Profile</a>
                        <a class="dropdown-item" href="global-network.html">Global Network</a>
                        <a class="dropdown-item" href="schools-for-good.html">Schools for Good</a>
                    </div>
                </div>  
                <!--new menu item drop down test-->
                </li>
                        
                        <li class="nav-item"><a class="nav-link js-scroll-trigger">About Us</a>
                            <!--new menu item drop down test-->
                            <div class="dropdown">
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="note-founder.html">Note from Founder</a>
                                    <a class="dropdown-item" href="note-principal.html">Note from Principal</a>
                                    <a class="dropdown-item" href="our-team.html">Our Team</a>
                                    <a class="dropdown-item" href="safety-security.html">Safety & Security</a>
                                    <a class="dropdown-item" href="career-at-gems.php">Careers at Gems</a>
                                    <a class="dropdown-item" href="contact-us.php">Contact Us</a>
                                </div>
                            </div>  
                        </li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" >For Parents</a>
                                <div class="dropdown">
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="parent-partnership.html">Parent Partnership</a>
                                    </div>
                                </div>  
                                    <!--new menu item drop down test-->    
                        </li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" >Learning</a>
                                <!--new menu item drop down test-->
                                <div class="dropdown">
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="curriculum.html">Curriculum</a>
                                        <a class="dropdown-item" href="early-childhood.html">Early Childhood</a>
                                        <a class="dropdown-item" href="primary-years.html">Primary Years</a>
                                        <a class="dropdown-item" href="middle-school.html">Middle School</a>
                                        <a class="dropdown-item" href="senior-school.html">Senior School</a>
                                        <a class="dropdown-item" href="beyond-books-and-boundaries.html">Beyond Books & Boundaries</a>
                                        <a class="dropdown-item" href="university-destination.html">University Destintions</a>
                                    </div>
                                </div>  
                                <!--new menu item drop down test-->    
                        </li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="career-at-gems.php"><button type="button" class="btn-2 btn-primary">Admissions</button></a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="page-head-learning">
            <div class="container d-flex h-50 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0 text-white text-uppercase">Gems International School</h1>
                    <h2 class="text-white mx-auto mt-2 mb-5">Welcome to GIS, Palam Vihar, Gurgaon.</h2>
                </div>
            </div>
        </header>

        <!-- FORM -->
        <section class="typical-section">
            <div class="container">
                <div>
                    <h3 class="text-center">For Admision enquires</h3>
                    <p class="text-center">Simply fill in the detail below and get a call back from our team</p>
                </div>
               
                <div class="admission-form d-flex justify-content-center">
                <form action="admissionform.php" method="POST" class="form">
                    <div class="form-group">
                        <label for="name" class="form-label text-primary">Your Name </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Jane Doe" tabindex="1" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label text-primary <?= $invalid_class_name ?? " "?>">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="jane@doe.com" tabindex="2" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="form-label text-primary">Contact Number</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" tabindex="3" required>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="form-label text-primary">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Admission Enquiry" tabindex="4" required>
                    </div>
                    <div class="form-group">
                        <label for="message" class="form-label text-primary">Message</label>
                        <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="5"></textarea>
                    </div>
                    <div class="text-center my-2">
                        <button type="submit" class="btn btn-primary">Send Message!</button>
                    </div>
                    <?php
                        if($email_sent):
                    ?>
                        <h3>Thank you, We will be in touch soon</h3>
                    <?php
                        endif;
                    ?>
               </div>

                </form>
            </div>
        </section>

        <div class="typical-section" >
            <div class="container" >
                <p>Take a look at the Admission Process for our School in Gurgaon. Secure admission for your child in one of the finest and top rated school in Gurgaon. Gems Education brings their flagship school to the metropolitan of Gurgaon. <br>GEMS Education continues to inspire generations of learners from across the globe, whose school successes give them the foundation to go on to achieve greatness and lead happy, fulfilling lives.<br>The quality of our schools and the education they provide is a reflection of the individuals that lead and support them. These are passionate, dedicated educators who help change and improve the lives of thousands of children across the globe, and we hold firm to our belief that all children have the right to a quality education. <br>We strongly believe that every child has talents and abilities that are as unique as their personality. We take pride in our inclusive ethos and in our commitment to helping every family find the right school for their child. <br>Once again, Come join us in shaping the future for our children with one of the top rated school in Gurgaon</p>

                <h3 class="text-primary">Admission process</h3>
                <p>
                Admission for the new academic year commences in the month of April. As per the CBSE norm K1 children registering for the Academic Session 2021-22 will have to be 3+ years old by 31st March 2021. For all other grades, admission is granted on the basis of an interaction/assessment.
                </p>
                <h5>Documentation Required</h5>
                <p>At the time of admission, students must present the following documents:</p>
                <ul>
                    <li>Completed admission form</li>
                    <li>Copy of the student’s Birth Certificate </li>
                    <li>Copy of the Parents Aadhar card</li>
                    <li>3 passport size photos of the student</li>
                    <li>Original Transfer Certificate or School Leaving Certificate.</li>
                    <li>Photocopy of student’s original mark sheet from the last examination passed in the previous school/li>
                    <li>Medical Certificate from a Doctor, declaring the health status of the student</li>
                </ul>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class=col-lg-6>
                            <table class="table table-primary text-uppercase mx-5 px-5 mt-5">
                            <thead>
                                <tr>
                                    <th>admission to class</th>
                                    <th>Minimum Age (As on 1st April 2021)</th>
                                    <th>Ideal / Recommended Age</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Playgroup</td>
                                    <td>2+</td>
                                    <td>2.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">KG I</td>
                                    <td>3+</td>
                                    <td>3.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">KG II</td>
                                    <td>4+</td>
                                    <td>4.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE I	</td>
                                    <td>5+</td>
                                    <td>5.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE II</td>
                                    <td>6+</td>
                                    <td>6.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE III</td>
                                    <td>7+</td>
                                    <td>7.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE IV</td>
                                    <td>8+</td>
                                    <td>8.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE V</td>
                                    <td>9+</td>
                                    <td>9.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE VI</td>
                                    <td>10+</td>
                                    <td>10.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE VII</td>
                                    <td>11+</td>
                                    <td>11.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE VIII</td>
                                    <td>12+</td>
                                    <td>12.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE IX</td>
                                    <td>13+</td>
                                    <td>13.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE X</td>
                                    <td>14+</td>
                                    <td>14.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE XI</td>
                                    <td>15+</td>
                                    <td>15.5+</td>
                                </tr>
                                <tr>
                                    <td scope="row">GRADE XII</td>
                                    <td>16+</td>
                                    <td>16.5+</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">Block C-2, Palam Vihar, Gurgaon, Haryana-122017</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50"><a href="#!">contactus.gis@gemsedu.in</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">95821 99008 | 73030 96206
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!--links for Policies-->        
                <div class="container-md d-flex my-5 px-3 justify-content-center text-black-50">
                    <a class="mx-3" href="#">About Us</a>
                    <a class="mx-3" href="#">Admission</a>
                    <a class="mx-3" href="#">Privacy Policy</a>
                    <a class="mx-3" href="#">Terms & Conditions</a>
                </div>

        <!--Social Media Links-->
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="https://twitter.com/gisGurugram?s=20"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="https://www.facebook.com/GemsInternationalSchool"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="https://www.instagram.com/gisgurugram/"><i class="fab fa-instagram-square"></i></a>
                    <a class="mx-2" href="https://www.linkedin.com/in/gems-international-school-79b950198/"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © Gems Education & Saeloun 2020</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>