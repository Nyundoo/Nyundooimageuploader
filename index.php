<?php
  use PHPMailer\PHPMailer\PHPMailer;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'vendor/autoload.php';

  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if(isset($_POST['url']) && $_POST['url'] == ''){

    if($_POST["message"] == "" || $_POST["name"] == ""){
        $output = '<p>Please press the back button and fill in all fields</p>';
    } else {

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
      $mail->isSMTP();
      $mail->Host = 'mail.bimatransportllc.com';
      $mail->SMTPAuth = true;
      $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ));
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'abdulkadir@bimatransportllc.com';
      // Gmail Password
      $mail->Password = 'Bima2022';
      $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';
      $mail->Port = 587;

      // Email ID from which you want to send the email
      $mail->setFrom($email);
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('abdulkadir@bimatransportllc.com');

      $mail->isHTML(true);
      $mail->Subject = 'Bima Transport Website Form Submission';
      $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";

      $mail->send();
      $output = '<div class="alert alert-success">
                  <h5>Thank you! for contacting us, Well get back to you soon!</h5></div>';
    } catch (Exception $e) {
      $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
  }
}
}

?>

<?php
include 'init.php';
include 'template/header.php';
if (logged_in()) {
    ?>
     <section id="about" class="about" style="height: 600px;">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2><?php 
                    if (logged_in()) {
                        $user_data = user_data('name');
                         echo 'Welcome ', $user_data['name'];
                     }
                    ?></h2>
            </div>

            <div class="row content" data-aos="fade-up">
                <div class="text-center">
                    <p>
                    Welcome, you can now start <a href="create_album.php">Create Albums</a> and <a href="upload_image.php">Upload Images</a>
                    </p>
                    <!-- <ul>
          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                    <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate
                        velit</li>
                    <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat
                    </li>
                    </ul> -->
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    
    <?php
}else {
    ?>
    <body>




<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <!-- <img src="assets/img/slide/slider-4.png" class="d-block w-100" alt="slide1"> -->
                <!-- <div id="homebanner_rephomebanner_ctl00_Image1" class="carousel-item bg_img_slide" style="background:url(assets/img/slide/slider-4.png)  no-repeat center center;  background-size: cover;" alt="banner3">
                    <a id="homebanner_rephomebanner_ctl00_ank">
                        <div id="homebanner_rephomebanner_ctl00_divcontent" class="carousel-caption">
                            <h1>Customer Centered.</h1>
                        </div>
                    </a>
                </div> -->
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Pitstop</span></h2>
                <p class="animate__animated fanimate__adeInUp">We are creative thinkers, branding experts, artisans
                    &
                    craftsmen of beautiful brands and bespoke solutions”</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <!-- <img src="assets/img/slide/slider-3.jpeg" class="d-block w-100" alt="slide2"> -->
                <h2 class="animate__animated animate__fadeInDown">Design</h2>
                <p class="animate__animated animate__fadeInUp">Using the power of design-led thinking, we craft unique solutions and integrate creativity into the very fabric of your business. We seek out the new, we challenge the old, and we create the unique.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <!-- <img src="assets/img/slide/slider-2.jpeg" class="d-block w-100" alt="slide3"> -->
                <h2 class="animate__animated animate__fadeInDown">Print</h2>
                <p class="animate__animated animate__fadeInUp">Pitstop's clients come from the education, business and government communities. Our printing services include the production of stationery, forms, print marketing collateral, labels, fliers, posters, brochures, company profiles, annual reports, strategic plans etc.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
        </div>

        <!-- Slide 4 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <!-- <img src="assets/img/slide/slider-1.jpg" class="d-block w-100" alt="slide4"> -->
                <h2 class="animate__animated animate__fadeInDown">Brand</h2>
                <p class="animate__animated animate__fadeInUp">Whether it’s launching a new brand or reinvigorating an old one, we‘ve perfected the art.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        </a>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
    </svg>

</section>
<!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>About</h2>
                <p>Also known as 'Builders of Brands'</p>
            </div>

            <div class="row content" data-aos="fade-up">
                <div class="text-center">
                    <p>
                        Pistop is a full-service branding and marketing firm that helps visionary organisations and individuals emphasize their strengths and elevate their brands. With a complete range of creative capabilities, we craft authentic brand experiences that engage and inspire audiences at every touch point.
                    </p>
                    <!-- <ul>
          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                    <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate
                        velit</li>
                    <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat
                    </li>
                    </ul> -->
                    <a href="#" class="btn-learn-more">Learn More</a>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <div class="container">
        <section id="services" class="features">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Services</h2>
                    <p>Our brand-building capabilities</p>
                </div>

                <ul class="nav nav-tabs row d-flex">
                    <li class="nav-item col-4" data-aos="zoom-in">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-1">
                            <!-- <i class="ri-gps-line"></i> -->
                            <img class="img-fluid white-icon" src="assets/img/type/offset.png"
                                style="height: 50px; margin: 10px;">
                            <h4 class="d-none d-lg-block">Graphic Design</h4>
                        </a>
                    </li>
                    <li class="nav-item col-4" data-aos="zoom-in" data-aos-delay="100">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                            <!-- <i class="ri-body-scan-line"></i> -->
                            <img class="img-fluid white-icon" src="assets/img/type/web-design.png"
                                style="height: 50px; margin: 10px;">
                            <h4 class="d-none d-lg-block">Website Design</h4>
                        </a>
                    </li>
                    <li class="nav-item col-4" data-aos="zoom-in" data-aos-delay="200">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                            <!-- <i class="ri-sun-line"></i> -->
                            <img class="img-fluid white-icon" src="assets/img/type/printer.png"
                                style="height: 50px; margin: 10px;">
                            <h4 class="d-none d-lg-block">Print on paper</h4>
                        </a>
                    </li>
                    <li class="nav-item col-4" data-aos="zoom-in" data-aos-delay="200">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-6">
                            <!-- <i class="ri-sun-line"></i> -->
                            <img class="img-fluid white-icon" src="assets/img/type/brand-image.png"
                                style="height: 50px; margin: 10px;">
                            <h4 class="d-none d-lg-block">Branding</h4>
                        </a>
                    </li>
                </ul>

                <div class="tab-content" data-aos="fade-up">
                    <div class="tab-pane" id="tab-1">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>We create brand touchpoints that tear through the clutter</h3>
                                <p class="fst-italic">Using the power of design-led thinking, we craft unique solutions and integrate creativity into the very fabric of your business. We seek out the new, we challenge the old, and we create the unique.
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Logo</li>
                                    <li><i class="ri-check-double-line"></i> Business Card</li>
                                    <li><i class="ri-check-double-line"></i> Company Profile</li>
                                    <li><i class="ri-check-double-line"></i> Brand Manual</li>
                                    <li><i class="ri-check-double-line"></i> Bronchutes</li>
                                    <li><i class="ri-check-double-line"></i> Fliers/ Poster</li>
                                    <li><i class="ri-check-double-line"></i> Product Package</li>
                                    <li><i class="ri-check-double-line"></i> Labels</li>
                                </ul>

                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <!-- <img src="assets/img/features-1.png" alt="" class="img-fluid"> -->
                                <video width="500px" height="500px" controls="controls">
                                    <source src="/assets/vid/vid2.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>We build interactive experiences that engage and inspire.</h3>
                                <p>
                                    Anyone can create a website. What we create are rich, digital brand experiences that connect with customers on a deeper level.
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Audit & analyticsUX/UI designCMS integrationContent strategy </li>
                                    <li><i class="ri-check-double-line"></i> SEOCopywriting</li>
                                    <li><i class="ri-check-double-line"></i> editingEcommerce platformsMobile</li>
                                    <li><i class="ri-check-double-line"></i> maintenance</li>
                                    <li><i class="ri-check-double-line"></i> Domain registrations</li>
                                    <li><i class="ri-check-double-line"></i> webhosting and maintainance</li>
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <!-- <img src="assets/img/features-2.png" alt="" class="img-fluid"> -->
                                <video width="500px" height="500px" controls="controls">
                                    <source src="/assets/vid/vid.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Clarity and Precision in Commercial Printing</h3>
                                <p>
                                    Pitstop's clients come from the education, business and government communities. Our printing services include the production of stationery, forms, print marketing collateral, labels, fliers, posters, brochures, company profiles, annual reports, strategic plans etc.
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Banners</li>
                                    <li><i class="ri-check-double-line"></i> Vinyl Stickers</li>
                                    <li><i class="ri-check-double-line"></i> Vehicle Branding</li>
                                    <li><i class="ri-check-double-line"></i> Wall Branding</li>
                                    <li><i class="ri-check-double-line"></i> Office Branding</li>
                                    <li><i class="ri-check-double-line"></i> 3D Signs</li>
                                    <li><i class="ri-check-double-line"></i> Lightbox Signs</li>
                                    <li><i class="ri-check-double-line"></i> Promotional Items</li>
                                </ul>

                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <!-- <img src="assets/img/features-3.png" alt="" class="img-fluid"> -->
                                <video width="500px" height="500px" controls="controls">
                                    <source src="/assets/vid/vid3.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-6">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>We build brands that cannot be ignored.</h3>
                                <p>
                                    This is our bread and butter (and sometimes our tea). Whether it’s launching a new brand or reinvigorating an old one, we‘ve perfected the art.
                                </p>
                                <p>Building bold, resonant, electrifying brands is what we’ve been doing for 12+ years. And although our branding clients range from tiny startups to global brands like Facebook and Microsoft, our recipe for success is fundamentally the same. It’s a highly collaborative process that begins with some intense introspection and discovery, explores strategic and creative options, and culminates with the launch (or relaunch) of an authentic brand that simply cannot be ignored.</p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Office/Showroom branding</li>
                                    <li><i class="ri-check-double-line"></i> Vehicle/Fleet branding</li>
                                    <li><i class="ri-check-double-line"></i> Promotional materials</li>
                                    <li><i class="ri-check-double-line"></i> Visibility materials</li>
                                    <li><i class="ri-check-double-line"></i> Events branding</li>
                                    <li><i class="ri-check-double-line"></i> Re-branding</li>
                                    <li><i class="ri-check-double-line"></i> Outdoor media and Signages</li>
                                    <li><i class="ri-check-double-line"></i> Transit media</li>
                                    <li><i class="ri-check-double-line"></i> Staff uniform</li>

                                </ul>
                                <!-- <ul>
                                    <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.
                                    </li>
                                    <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit
                                        in voluptate velit.
                                    </li>
                                    <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.
                                        Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda
                                        mastiro dolore eu
                                        fugiat nulla pariatur.</li>
                                </ul> -->
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <!-- <img src="assets/img/features-4.png" alt="" class="img-fluid"> -->
                                <video width="500px" height="500px" controls="controls">
                                    <source src="/assets/vid/vid6.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->
   

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Portfolio</h2>
                    <p>Look what we have done</p>
                </div>
                <?php
$ports = get_ports();

if (empty($ports)) {
    echo '<p>You don\'t have any portfolio</p>';
}else{
    ?>
    <ul id="portfolio-flters" class="d-flex justify-content-end" data-aos="fade-up">
        <?php
        echo '<li data-filter="*" class="filter-active">All</li>';
    foreach ($ports as $port) {
        echo ' <li data-filter=".filter-' ,$port['id'], '">', $port['name'], '</li>';
    } 
    ?>
    </ul>
    <?php
}
?>
                <div class="row portfolio-container" data-aos="fade-up">

                <?php
                    $albums = get_albumsx();
                    

                    if (empty($albums)) {
                        echo '<p>You don\'t have any albums</p>';
                    }else{
                        foreach ($albums as $album) {
                 echo '<div class="col-lg-4 col-md-6 portfolio-item filter-' ,$album['category'], '">
                        <div class="portfolio-img"><img src="/port/' ,$album['id'], '/' ,$album['id'], '.' ,$album['ext'], '" class="img-fluid" alt="image" /></div>
                        <div class="portfolio-info">
                         <h4>' ,$album['name'], '</h4>
                         <p>', $album['description'], '...</p>
                            <a href="/port/' ,$album['id'], '/' ,$album['id'], '.' ,$album['ext'], '" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="' ,$album['name'], '"><i class="bx bx-plus"></i></a>
                            <a href="wall-branding-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>';
                        } 
                    }
                    ?>

                    <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-wall">
                        <div class="portfolio-img"><img src="/assets/img/portfolio/portfolio-1.jpg"
                                class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>Wall Branding</h4>
                            <p>Branding</p>
                            <a href="/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="wall-branding-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-media">
                        <div class="portfolio-img"><img src="/assets/img/portfolio/portfolio-2.jpg"
                                class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>Promotional Materials</h4>
                            <p>Design</p>
                            <a href="/assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="promo-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div> -->

                </div>

            </div>
        </section>
        <!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Testimonials</h2>
                    <p>What they are saying about us</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    The team at PITSTOP are always great to work with. They take everything off my
                                    plate and come up
                                    with something amazing.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                    alt="image">
                                <h3>Rev. Dodzweit Achero</h3>
                                <h4>House Of Grace Church Embakasi</h4>
                            </div>
                        </div>
                        <!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    When they asked for an opportunity to rebrand Mediheal Hospitals, it was hard to
                                    resist them. The
                                    brand plan they presented to us has made Mediheal a household brand today.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="assets/img/testimonials/testimonials-2.jpeg" class="testimonial-img"
                                    alt="">
                                <h3>Mr. Ashish Raman</h3>
                                <h4>General Manager - Mediheal Group Of Hospitals</h4>
                            </div>
                        </div>
                        <!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Working with Pitstop Limited has always been a gratifying experience. They walk
                                    with you through
                                    your brand journey making sure your brand is articulated both in public and
                                    online.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Hon. Dr. Mishra Swarup Ranjan</h3>
                                <h4>Member Of Parliament - Kesses Constituency</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    As a leading PR Company in Kenya, partnering with Pitstop as our branding agency
                                    is one of the
                                    greatest decision we ever made. They deliver quality in a timely fashion.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="assets/img/testimonials/testimonials-4.jpeg" class="testimonial-img"
                                    alt="">
                                <h3>Kentice Tikolo</h3>
                                <h4>Director - Impact Africa</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Pitstop has never disappointed us. Their integrity level is second to none…and
                                    that’s the beauty
                                    about Pitstop. I recommend them highly.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Dr Susan Wafula</h3>
                                <h4>Procurement Manager at Global Programs</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Pitstop Limited has been a pleasure to work with. They worked efficiently and
                                    were very patient with
                                    us! We are delighted with our new brand. Thank you!
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="assets/img/testimonials/testimonials-6.jpeg" class="testimonial-img"
                                    alt="">
                                <h3>Hon. Jane Muringi</h3>
                                <h4>Madam Jane Foundation</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    We really love the work you guys did, the introduction of a brand manual to us
                                    has made our brand
                                    vision more clearer and eased our procurement processes.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="assets/img/testimonials/testimonials-7.jpeg" class="testimonial-img"
                                    alt="">
                                <h3>Eng. Michael Maina Wamae</h3>
                                <h4>CEO &#38; Founder, Urban Concrete Limited</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    I prefer referring to them by their slogan “Builders Of Brands” because no
                                    branding agency out here
                                    has mastered the art of building formidable brands like Pitstop. Trust Me!
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/assets/img/testimonials/testimonials-8.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Israel Burale</h3>
                                <h4>Life Coach &#38; Motivational Speaker</h4>
                            </div>
                        </div>
                        <!-- End testimonial item -->


                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
        <!-- End Testimonials Section -->

        <!-- ======= Pricing Section ======= -->
        <!-- <section id="pricing" class="pricing">
  <div class="container">

    <div class="section-title" data-aos="zoom-out">
      <h2>Pricing</h2>
      <p>Our Competing Prices</p>
    </div>

    <div class="row">

      <div class="col-lg-3 col-md-6">
        <div class="box" data-aos="zoom-in">
          <h3>Free</h3>
          <h4><sup>$</sup>0<span> / month</span></h4>
          <ul>
            <li>Aida dere</li>
            <li>Nec feugiat nisl</li>
            <li>Nulla at volutpat dola</li>
            <li class="na">Pharetra massa</li>
            <li class="na">Massa ultricies mi</li>
          </ul>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Buy Now</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
        <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
          <h3>Business</h3>
          <h4><sup>$</sup>19<span> / month</span></h4>
          <ul>
            <li>Aida dere</li>
            <li>Nec feugiat nisl</li>
            <li>Nulla at volutpat dola</li>
            <li>Pharetra massa</li>
            <li class="na">Massa ultricies mi</li>
          </ul>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Buy Now</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
        <div class="box" data-aos="zoom-in" data-aos-delay="200">
          <h3>Developer</h3>
          <h4><sup>$</sup>29<span> / month</span></h4>
          <ul>
            <li>Aida dere</li>
            <li>Nec feugiat nisl</li>
            <li>Nulla at volutpat dola</li>
            <li>Pharetra massa</li>
            <li>Massa ultricies mi</li>
          </ul>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Buy Now</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
        <div class="box" data-aos="zoom-in" data-aos-delay="300">
          <span class="advanced">Advanced</span>
          <h3>Ultimate</h3>
          <h4><sup>$</sup>49<span> / month</span></h4>
          <ul>
            <li>Aida dere</li>
            <li>Nec feugiat nisl</li>
            <li>Nulla at volutpat dola</li>
            <li>Pharetra massa</li>
            <li>Massa ultricies mi</li>
          </ul>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Buy Now</a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section> -->
        <!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <!-- <section id="faq" class="faq">
  <div class="container">

    <div class="section-title" data-aos="zoom-out">
      <h2>F.A.Q</h2>
      <p>Frequently Asked Questions</p>
    </div>

    <ul class="faq-list">

      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
          <p>
            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
          </p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
          <p>
            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
          </p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
          <p>
            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
          </p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq4" class="collapse" data-bs-parent=".faq-list">
          <p>
            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
          </p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq5" class="collapse" data-bs-parent=".faq-list">
          <p>
            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
          </p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq6" class="collapse" data-bs-parent=".faq-list">
          <p>
            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
          </p>
        </div>
      </li>

    </ul>

  </div>
</section> -->
        <!-- End F.A.Q Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Team</h2>
                    <p>Meet our geniuses</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>BLAK AENDE</h4>
                                <span>CHIEF EXECUTIVE OFFICER</span>
                                <h8>Over 12 years experience in Brand Management</h8>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="/assets/img/team/team-2.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>RICKY OMONDI</h4>
                                <span>OPERATIONS MANAGER</span>
                                <h8>Over 6 years Experience</h8>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="/assets/img/team/team-3.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>LOISE BERTINA</h4>
                                <span>COMPANY ADMINISTRATOR</span>
                                <h8>Over 5 years Experience</h8>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="/assets/img/team/team-4.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>FRED NGIENDO</h4>
                                <span>HEAD OF MARKETING</span>
                                <h8>Over 11 years experiencent</h8>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="section-title" data-aos="zoom-out">
                    <h2>Team</h2>
                    <p>Meet our Worker</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="/assets/img/team/team-5.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>JOSYLNE KENIK</h4>
                                <span>COMPANY ACCOUNTANT</span>
                                <h8>Over 8 years Experience</h8>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="/assets/img/team/team-7.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>VICTOR KARIUKI</h4>
                                <span>HEAD OF CREATIVE</span>
                                <h8>7 years experience</h8>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="/assets/img/team/team-8.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>TINA NANZALA</h4>
                                <span>GRAPHIC DESIGNER</span>
                                <h8>over 2 years experience</h8>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="/assets/img/team/team-9.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>JOHN MWIKYA</h4>
                                <span>PRODUCTION</span>
                                <h8>Over 3 years experience</h8>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>Vision Plaza, Mombasa Road, Nairobi</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@pitstoplimited.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+254 722 707205</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">



                        <!-- <form action="#contact" method="post" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone Number"
                  required>
              </div>

              <div class="antispam">
                        <input type="text" name="url" id="email" class="form-control" />
                    </div>

              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form> -->

                        <form action="#contact" method="POST" id="contactForm" class="php-email-form">
                            <div class="row align-items-stretch mb-5">
                                <div class="form-group">
                                    <?= $output; ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-Mail</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Enter E-Mail" required>
                                    </div>

                                    <div class="antispam">
                                        <label for="email">Leave this empty</label>
                                        <input type="text" name="url" id="email" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control"
                                            placeholder="Enter Subject" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group form-group-textarea mb-md-0">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" rows="8" class="form-control"
                                            placeholder="Write Your Message" required></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input class="btn btn-primary btn-xl text-uppercase" type="submit" name="submit"
                                        value="Send" class="btn btn-danger btn-block" id="sendBtn">
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </section>
        <!-- End Contact Section -->

</main><!-- End #main -->


</body>
    <?php

}

include 'template/footer.php';
?>