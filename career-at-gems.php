<?php
$postData = $uploadedFile = $statusMsg = '';
$msgClass = 'errordiv';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $postData = $_POST;
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
        
        // Validate email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
        }else{
            $uploadStatus = 1;
            
            // Upload attachment file
            if(!empty($_FILES["attachment"]["name"])){
                
                // File path config
                $targetDir = "uploads/";
                $fileName = basename($_FILES["attachment"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                
                // Allow certain file formats
                $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to the server
                    if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath)){
                        $uploadedFile = $targetFilePath;
                    }else{
                        $uploadStatus = 0;
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                }else{
                    $uploadStatus = 0;
                    $statusMsg = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.';
                }
            }
            
            if($uploadStatus == 1){
                
                // Recipient
                $toEmail = 'gisgurgaon2020@gmail.com';

                // Sender
                $from = 'admision@gemsedu.in';
                $fromName = 'career@GEMS';
                
                // Subject
                $emailSubject = 'Contact Request Submitted by '.$name;
                
                // Message 
                $htmlContent = '<h2>Contact Request Submitted</h2>
                    <p><b>Name:</b> '.$name.'</p>
                    <p><b>Email:</b> '.$email.'</p>
                    <p><b>Subject:</b> '.$subject.'</p>
                    <p><b>Message:</b><br/>'.$message.'</p>';
                
                // Header for sender info
                $headers = "From: $fromName"." <".$from.">";

                if(!empty($uploadedFile) && file_exists($uploadedFile)){
                    
                    // Boundary 
                    $semi_rand = md5(time()); 
                    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
                    
                    // Headers for attachment 
                    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
                    
                    // Multipart boundary 
                    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 
                    
                    // Preparing attachment
                    if(is_file($uploadedFile)){
                        $message .= "--{$mime_boundary}\n";
                        $fp =    @fopen($uploadedFile,"rb");
                        $data =  @fread($fp,filesize($uploadedFile));
                        @fclose($fp);
                        $data = chunk_split(base64_encode($data));
                        $message .= "Content-Type: application/octet-stream; name=\"".basename($uploadedFile)."\"\n" . 
                        "Content-Description: ".basename($uploadedFile)."\n" .
                        "Content-Disposition: attachment;\n" . " filename=\"".basename($uploadedFile)."\"; size=".filesize($uploadedFile).";\n" . 
                        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                    }
                    
                    $message .= "--{$mime_boundary}--";
                    $returnpath = "-f" . $email;
                    
                    // Send email
                    $mail = mail($toEmail, $emailSubject, $message, $headers, $returnpath);
                    $confirmation_message = "Your contact request has been submitted successfully with attachment !";
                    
                    // Delete attachment file from the server
                    // @unlink($uploadedFile);
                }else{
                     // Set content-type header for sending HTML email
                    $headers .= "\r\n". "MIME-Version: 1.0";
                    $headers .= "\r\n". "Content-type:text/html;charset=UTF-8";
                    
                    // Send email
                    $mail = mail($toEmail, $emailSubject, $htmlContent, $headers); 
                    $confirmation_message = "Your contact request has been submitted successfully without attachment !";
                }
                
                // If mail sent
                if($mail){
                    // $statusMsg = 'Your contact request has been submitted successfully !';
                    $statusMsg = $confirmation_message;
                    $msgClass = 'succdiv';
                    
                    $postData = '';
                }else{
                    $statusMsg = 'Your contact request submission failed, please try again.';
                }
            }
        }
    }else{
        $statusMsg = 'Please fill all the fields.';
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
        
        <script>history.pushState({}, "", "")</script>
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
        <header class="page-head-team">
            <div class="container d-flex h-50 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0 text-white text-uppercase">Gems International School</h1>
                    <h2 class="text-white mx-auto mt-2 mb-5">Welcome to GIS, Palam Vihar, Gurgaon.</h2>
                </div>
            </div>
        </header>

        <!-- div -->
        <div class="typical-section">
            <div class="container">
                <div>
                    <h3 class="text-center">Career at GEMS</h3>
                    <p class="text-center">Simply fill in the detail below and get a call back from our team</p>

                    <p>Want to know how we find expert, passionate and pioneering people? Find out what it’s really like to teach and work with us. In this section you’ll find everything you need to know about your new career with <a href="https://gemsinternationalschoolgurgaon.com/">GEMS</a>. Unlike others, we don’t work with recruitment agencies or agents. So you will get to know us right from the beginning. Please fill in the application form</p><p><b>GEMS Education</b>, founded as <b>Global Education Management Systems</b> (<b>GEMS</b>), is an international education company. It is a global advisory and educational management firm, and is the largest operator of kindergarten-to-grade-12 schools in the world, with a network of over 70 schools in over a dozen countries. Founded by <a title="Sunny Varkey" href="https://en.wikipedia.org/wiki/Sunny_Varkey">Sunny Varkey</a>, GEMS provides <a title="Pre-school" href="https://en.wikipedia.org/wiki/Pre-school">pre-school</a>, <a title="Primary education" href="https://en.wikipedia.org/wiki/Primary_education">primary</a>, and <a title="Secondary education" href="https://en.wikipedia.org/wiki/Secondary_education">secondary</a> education. Through its consultancy arm, GEMS Education Solutions, the company works internationally with public and private sector clients on school improvement initiatives.</p><p>The <a title="Varkey Foundation" href="https://en.wikipedia.org/wiki/Varkey_Foundation">Varkey Foundation</a>, formerly known as the Varkey GEMS Foundation, is the philanthropic arm of GEMS Education. It aims to impact 100 underprivileged children for every child enrolled in a GEMS school.</p><p>Founded and headquartered in <a title="Dubai" href="https://en.wikipedia.org/wiki/Dubai">Dubai</a>, GEMS has offices in the <a title="United Kingdom" href="https://en.wikipedia.org/wiki/United_Kingdom">United Kingdom</a>, the <a title="United States" href="https://en.wikipedia.org/wiki/United_States">United States</a>, <a title="Singapore" href="https://en.wikipedia.org/wiki/Singapore">Singapore</a>, <a title="India" href="https://en.wikipedia.org/wiki/India">India</a>, <a title="Saudi Arabia" href="https://en.wikipedia.org/wiki/Saudi_Arabia">Saudi Arabia</a>, <a title="Qatar" href="https://en.wikipedia.org/wiki/Qatar">Qatar</a>, <a title="Egypt" href="https://en.wikipedia.org/wiki/Egypt">Egypt</a>, <a title="Kenya" href="https://en.wikipedia.org/wiki/Kenya">Kenya</a>, and the <a title="United Arab Emirates" href="https://en.wikipedia.org/wiki/United_Arab_Emirates">United Arab Emirates</a>.</p><p>Experienced educators enrich GEMS classrooms with empowering learning experiences. Our thoughtfully selected faculty, is continuously engaged in learning through professional development and sharing of good practice. A rich legacy of over 5 decades of international pedagogical research and quality benchmarking standards inform school experiences and staff development.</p><p>Thus, our schools are truly empowered with 60+ years of GEMS educational expertise, across 176 countries and more than 20,000 education professionals. The highly enriched learning environment and trained faculty members inspire children to think critically beyond the ordinary, evaluate scenarios, express their opinions with evidence-based logic, ask relevant questions, solve problems and lead through innovative solutions.</p><p>To find out more about Career at GEMS International School, send us your resume today.</p>
                </div>
                
            </div>
        </div>
        <!-- FORM -->
        <section class="typical-section">
            <div class="container">
            
               <!-- Display submission status -->
                    <?php if(!empty($statusMsg)){ ?>
                        <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
                    <?php } ?>

                    <!-- Display contact form -->
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" placeholder="Name" required="">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" placeholder="Email address" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" placeholder="Subject" required="">
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Write your message here" required=""><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="attachment" class="form-control">
                        </div>
                        <div class="submit">
                            <input type="submit" name="submit" class="btn-2 btn-primary" value="SUBMIT">
                        </div>
                    </form>
                
            </div>
        </section>

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