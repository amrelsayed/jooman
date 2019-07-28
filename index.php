<?php
    // Check if User Coming From A Request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $first_name = $last_name = $company = $email  = $phone  = $website  = $message = '';

        // Assign Variables
        $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
        $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_EMAIL);
        $company = filter_var($_POST['company'], FILTER_SANITIZE_NUMBER_INT);
        $email  = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $phone  = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        $website  = filter_var($_POST['website'], FILTER_SANITIZE_STRING);
        $message  = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        // Creating Array of Errors
        $formErrors = array();
        if (
            strlen($first_name) >= 100 || strlen($last_name) >= 100 || strlen($company) >= 200 ||
            strlen($email) >= 200 || strlen($phone) >= 100 || strlen($website) >= 200 || strlen($message) >= 2000
            ) {
            $formErrors[] = 'You entered a very long text in some fileds';
        }

        // If No Errors Send The Email [ mail(To, Subject, Message, Headers, Parameters) ]
        $headers = 'From: ' . $email . '\r\n';
        $myEmail = 'amr-elsayed@outlook.com';
        $subject = 'Jomaan Request Demo Form';
        $body = 'First Name: ' . $first_name . '\r\n' .
                'Last Name: ' . $last_name . '\r\n' .
                'Company: ' . $company . '\r\n' .
                'Email: ' . $email . '\r\n' .
                'Phone: ' . $phone . '\r\n' .
                'Website: ' . $website . '\r\n' .
                'Message: ' . $message;

        if (empty($formErrors)) {
            mail($myEmail, $subject, $body, $headers);

            $first_name = $last_name = $company = $email  = $phone  = $website  = $message = '';

            $success = '<div class="alert alert-success">We Have Recieved Your Message</div>';
        }

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jooman</title>
    <!-- favicon CSS -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo.png">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
    <!-- custom fonts -->
    <link href="fonts/aileron.css" rel="stylesheet">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/app.css">
    <!-- Your CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>

<body class="" data-spy="scroll" data-target="#navbar-nav">

    <!-- =========== Preloader Start ============ -->
    <div class="preloader-main">
        <div class="preloader-wapper">
            <svg class="preloader" xmlns="http://www.w3.org/2000/svg" version="1.1" width="600" height="200">
                <defs>
                    <filter id="goo" x="-40%" y="-40%" height="200%" width="400%">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -8" result="goo" />
                    </filter>
                </defs>
                <g filter="url(#goo)">
                    <circle class="dot bg-fill-primary " cx="50" cy="50" r="25" />
                    <circle class="dot" cx="50" cy="50" r="25" fill="#4c83ff" />
                </g>
            </svg>
            <div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
        </div>
    </div>
    <!-- =========== Preloader End ============ -->

    <div class="main">
        <!-- =========== Start of Navigation (main menu) ============ -->
        <header class="navbar navbar-sticky navbar-expand-lg navbar-light">
            <div class="container position-relative">
                <a class="navbar-brand mr-70" href="index.html">
                    <img class="navbar-brand__regular" src="img/logo.jpg" alt="brand-logo">
                    <img class="navbar-brand__sticky" src="img/logo.jpg" alt="sticky brand-logo">
                </a>
                <!--  End of brand logo -->
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- end of Nav toggler -->

                <div class="navbar-inner">
                    <!--  Nav close button inside off-canvas/ mobile menu -->
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- end of Nav Toggoler -->
                    <nav>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#features">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#howitworks">How It Works</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#ourstrength">Our Strength</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pricing">Pricing</a>
                            </li>
                        </ul>
                        <!-- end of nav menu items -->
                    </nav>
                </div>
                <div class="flex-row ml-lg-auto d-md-flex mr-70 mr-lg-0 d-none d-sm-inline-block">
                    <a href="#requestdemo" class="btn btn--outline btn--sm btn-3d-hover btn-splash-hover">
                        <span class="btn__text">Request For Demo</span>
                    </a>
                </div>
                <!-- end of nav cta button -->
            </div>
            <!-- end of container -->
        </header>
        <!-- =========== End of Navigation (main menu)  ============ -->

        <!-- =========== Start of Hero ============ -->
        <section class="space-bottom--lg hero hero--reverse hidden">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-lg-flex align-items-lg-center position-relative text-center text-lg-left">
                            <picture class="hero__image push-out-container pos-abs-lg-bottom mb-30 mb-md-40 mb-lg-0">
                                <img src="img/hero-1.png" alt="hero-image">
                            </picture>
                            <div class="hero-content">
                                <h1 class="hero__title">We build a powerful Site Search and Recommendation platform.</h1>
                                <p class="lead hero__description">
                                  that helps your website and content teams save time and create more value.
                                </p>
                                <div class="button-group align-items-center justify-content-center justify-content-lg-start">
                                    <a href="#requestdemo" class="btn btn--bg-primary btn-3d-hover btn-splash-hover">
                                        <span class="btn__text">Get started</span>
                                    </a>
                                </div>
                            </div>
                            <!-- end of content -->
                        </div>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Hero ============ -->

        <!-- =========== Start of Content Block ============ -->
        <section class="space bg-color-grey">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mb-40 mb-lg-0">
                        <picture>
                            <img src="img/build.png" alt="build">
                        </picture>
                    </div>
                    <div class="col-12 col-lg-5 ml-auto reveal">
                        <h3 class="mb-30">E-COMMERCE</h3>
                        <h5 class="mb-3">Personalize the Shopping Experience</h5>
                        <ul class="mb-30">
                            <li class="mb-2">Your users want an intuitive shopping experience. </li>
                            <li class="mb-2">We enable teams to create a personalized site search and discovery</li>
                            <li class="mb-2">experience that customers will love.</li>
                            <li class="mb-2">And recommend product for them exactly when they need it</li>
                        </ul>
                    </div>
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Content Block ============ -->

        <!-- =========== Start of Content Block ============ -->
        <section class="space-top pb-50">
            <div class="container position-relative">
                <div class="background-holder background-holder--circle">
                    <img src="img/oval.svg" alt="oval" class="background-image-holder">
                </div>
                <!-- end of background-holder image -->
                <div class="row flex-row-reverse">
                    <div class="col-12 col-lg-6 ml-auto">
                        <picture>
                            <img src="img/blocks.png" alt="blocks">
                        </picture>
                    </div>
                    <div class="col-12 col-lg-5 mt-lg-5 mt-0 reveal">
                        <h3 class="mb-30">MEDIA</h3>
                        <h5 class="mb-3">Unique Experiences to Drive Engagement</h5>
                        <ul>
                          <li class="mb-2">Users are looking to consume engaging content. </li>
                          <li class="mb-2">We empower teams to surface the freshest and most relevant content, and ultimately drive user satisfaction.</li>
                        </ul>

                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Content Block ============ -->

        <!-- =========== Start of Features ============ -->
        <section class="space-bottom" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 mx-auto">
                        <div class="section-title reveal text-center mb-80 mb-sm-50">
                            <h3 class="mb-3">Features</h3>
                        </div>
                        <!-- end of section title -->
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
                <div class="row">
                    <div class="col-12">
                        <div class="features features--slider reveal">
                            <div class="sub-header">
                                <div class="swipe-tabs">
                                    <div class="swipe-tab text-left">
                                        <div class="swipe-tab__inner d-inline-flex flex-column align-items-center text-center">
                                            <span class="tab__icon">
                                                <img src="img/icon-drag.png" alt="icon">
                                            </span>
                                            <span class="tab__title font-size-21 font-weight-bold">Personal Approach</span>
                                        </div>
                                    </div>
                                    <!-- end of tab one -->
                                    <div class="swipe-tab text-center">
                                        <div class="swipe-tab__inner d-inline-flex flex-column align-items-center text-center">
                                            <span class="tab__icon d-flex flex-column">
                                                <img src="img/icon-settings.png" alt="icon">
                                            </span>
                                            <span class="tab__title font-size-21 font-weight-bold">Create reach experience</span>
                                        </div>
                                    </div>
                                    <!-- end of two one -->

                                    <div class="swipe-tab text-right">
                                        <div class="swipe-tab__inner d-inline-flex flex-column align-items-center text-center">
                                            <span class="tab__icon">
                                                <img src="img/icon-responsive.png" alt="icon">
                                            </span>
                                            <span class="tab__title font-size-21 font-weight-bold">Seamless experience anywhere</span>
                                        </div>
                                    </div>
                                    <!-- end of tab three -->
                                </div>
                            </div>
                            <!-- end of tabs -->
                            <div class="main-container">
                                <div class="swipe-tabs-container">
                                    <div class="swipe-tab-content d-lg-flex justify-content-md-between align-items-center">
                                        <picture class="features--tab__image">
                                            <img src="img/features-1.png" alt="browser-image">
                                        </picture>
                                        <div class="tab-content">
                                            <p>Personalization is a strategy allows businesses to customize what content a user sees based upon prior online behavior by including the user’s profile into the ranking strategy. Use a list of inputs about online behavior to influence the content that a specific user will see.</p>
                                        </div>
                                    </div>
                                    <!-- end of first tab content -->

                                    <div class="swipe-tab-content d-lg-flex justify-content-md-between align-items-center">
                                        <picture class="features--tab__image">
                                            <img src="img/features-2.png" alt="browser-image">
                                        </picture>
                                        <div class="tab-content">
                                            <p>We provide the tools to build and customize a state-of-the-art site search and discovery experience that embraces your brand on every device.
Easily bring features including autocomplete, filters and facets, Snippet & Highlighting, Multi-lingual, Did you mean, synonyms management, query suggestions and many more to your visitors, wherever they are, with unparalleled speed and relevance.</p>
                                        </div>
                                    </div>
                                    <!-- end of second tab content -->

                                    <div class="swipe-tab-content d-lg-flex justify-content-md-between align-items-center">
                                        <picture class="features--tab__image">
                                            <img src="img/features-3.png" alt="browser-image">
                                        </picture>
                                        <div class="tab-content">
                                            <p>Delight your visitors with meaningful content as they engage with your brand. Proactively address their needs by integrating content info a single unified experience across your online properties, such as blog posts, FAQs, user-generated content and other relevant data.</p>
                                        </div>
                                    </div>
                                    <!-- end of third tab content -->
                                </div>
                            </div>
                            <!-- end of tab/ features items -->
                        </div>
                        <!-- end of features -->
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->

        </section>
        <!-- =========== End of Features ============ -->

        <!-- =========== Start of Process ============ -->
        <section class="space-top bg-color-grey" id="howitworks">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 mx-auto">
                        <div class="section-title reveal text-center mb-80 mb-sm-50">
                            <h3 class="mb-3">How it works</h3>
                        </div>
                        <!-- end of section title -->
                    </div>
                </div>
                <!-- end of row -->
                <div class="working-process reveal">
                    <div class="row space-bottom border-bottom-light">
                        <div class="col-12 col-md-4">
                            <div class="working-process-block text-center">
                                <span class="mb-30 icon-dotted position-relative">
                                    <i class="icon icon-pin-2"></i>
                                </span>
                                <h4 class="font-size-21 mb-10">
                                    Collect Data
                                </h4>
                                <p>either using our API, or let our spiders crawl your  website.</p>
                            </div>
                        </div>
                        <!-- end of col -->
                        <div class="col-12 col-md-4">
                            <div class="working-process-block text-center">
                                <span class="mb-30 icon-dotted position-relative">
                                    <i class="icon icon-layout-11"></i>
                                </span>
                                <h4 class="font-size-21 mb-10">
                                    Apply our AI Algorithms
                                </h4>
                                <p>make use of latest NLP and ML to get most relevant results for your user.</p>
                            </div>
                        </div>
                        <!-- end of col -->
                        <div class="col-12 col-md-4">
                            <div class="working-process-block text-center">
                                <span class="mb-30 icon-dotted position-relative">
                                    <i class="icon icon-spaceship"></i>
                                </span>
                                <h4 class="font-size-21 mb-10">
                                    Happy User
                                </h4>
                                <p>increase sales and engagement.</p>
                            </div>
                        </div>
                        <!-- end of col -->
                    </div>
                    <!-- end of row -->
                </div>
                <!-- end of working process -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Process ============ -->

        <!-- =========== Start of Features ============ -->
        <section class="space-top space-bottom" id="ourstrength">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 mx-auto">
                        <div class="section-title reveal text-center mb-80 mb-sm-50">
                            <h3 class="mb-3">Our Strength</h3>
                        </div>
                        <!-- end of section title -->
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
                <div class="row">
                    <div class="col-12">
                        <div class="features features--slider reveal">
                            <div class="sub-header">
                                <div class="swipe-tabs">
                                    <div class="swipe-tab text-right">
                                        <div class="swipe-tab__inner d-inline-flex flex-column align-items-center text-center">
                                            <span class="tab__icon">
                                                <img src="img/icon-drag.png" alt="icon">
                                            </span>
                                            <span class="tab__title font-size-21 font-weight-bold">Arabic Support</span>
                                        </div>
                                    </div>
                                    <!-- end of tab four -->

                                    <div class="swipe-tab text-right">
                                        <div class="swipe-tab__inner d-inline-flex flex-column align-items-center text-center">
                                            <span class="tab__icon">
                                                <img src="img/icon-settings.png" alt="icon">
                                            </span>
                                            <span class="tab__title font-size-21 font-weight-bold">Secure</span>
                                        </div>
                                    </div>
                                    <!-- end of tab five -->

                                    <div class="swipe-tab text-right">
                                        <div class="swipe-tab__inner d-inline-flex flex-column align-items-center text-center">
                                            <span class="tab__icon">
                                                <img src="img/icon-responsive.png" alt="icon">
                                            </span>
                                            <span class="tab__title font-size-21 font-weight-bold">Reliable</span>
                                        </div>
                                    </div>
                                    <!-- end of tab six -->
                                </div>
                            </div>
                            <!-- end of tabs -->
                            <div class="main-container">
                                <div class="swipe-tabs-container">
                                    <div class="swipe-tab-content d-lg-flex justify-content-md-between align-items-center">
                                        <picture class="features--tab__image">
                                            <img src="img/features-1.png" alt="browser-image">
                                        </picture>
                                        <div class="tab-content">
                                            <p>We provide Custom Search supports indexing Arabic content and data.</p>
                                        </div>
                                    </div>
                                    <!-- end of 4 tab content -->

                                    <div class="swipe-tab-content d-lg-flex justify-content-md-between align-items-center">
                                        <picture class="features--tab__image">
                                            <img src="img/features-2.png" alt="browser-image">
                                        </picture>
                                        <div class="tab-content">
                                            <p>We are committed to delivering a highly secure and compliant environment for our customers.</p>
                                        </div>
                                    </div>
                                    <!-- end of 5 tab content -->

                                    <div class="swipe-tab-content d-lg-flex justify-content-md-between align-items-center">
                                        <picture class="features--tab__image">
                                            <img src="img/features-3.png" alt="browser-image">
                                        </picture>
                                        <div class="tab-content">
                                            <p>We stand behind our service with an industry leading 99.999% SLA available. With geographical distribution data centers around the globe.</p>
                                        </div>
                                    </div>
                                    <!-- end of 6 tab content -->

                                </div>
                            </div>
                            <!-- end of tab/ features items -->
                        </div>
                        <!-- end of features -->
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->

        </section>
        <!-- =========== End of Features ============ -->

        <!-- =========== Start of Testimonial ============ -->
        <section class="bg-color-primary space position-relative">
            <div class="background-holder background-holder--top">
                <img src="img/testimonial-bg.svg" alt="pattern" class="background-image-holder">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mx-auto">
                        <div class="section-title reveal text-center mb-80 mb-sm-50">
                            <h3 class="mb-3">Existing Customers</h3>
                        </div>
                        <!-- end of section title -->
                    </div>
                </div>
                <!-- end of row -->

                <div class="row">
                  <div class="col-2"></div>
                    <div class="col-4">
                        <a href="https://www.rqiim.com" target="_blank"><img style="max-height: 133px;" src="img/raqiim.png" alt="testimonial"></a>
                    </div>
                    <!-- end of col -->
                    <div class="col-4">
                          <a href="https://www.3oqool.com/" target="_blank"><img src="img/3oqool.png" alt="testimonial"></a>
                    </div>
                    <!-- end of col -->
                    <div class="col-2"></div>
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Testimonial ============ -->

        <!-- =========== Start of Pricing ============ -->
        <section class="space bg-color-grey" id="pricing">
            <div class="background-holder">
                <img src="img/pricing-bg.svg" alt="pattern" class="background-image-holder">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mx-auto">
                        <div class="section-title reveal text-center mb-80 mb-sm-50">
                            <h3 class="mb-3">Pricing</h3>
                            <p class="lead">Flexible and scalable pricing to grow with your needs. All packages include continues indexing in addition to index hosting costs on Lableb secure cloud.</p>
                        </div>
                        <!-- end of section title -->
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4 reveal">
                        <div class="card text-center mb-40">
                            <div class="header pt-30 pb-30 border-bottom-light">
                                <h2 class="h1-font color-primary">$0</h2>
                                <span class="h6-font font-weight-bold">Free Version</span>
                            </div>
                            <div class="body pb-40 pt-30 pr-30 pl-30">
                                <ul>
                                  <li class="mb-2">Arabic English Search</li>
                                  <li class="mb-2">Auto-complete</li>
                                  <li class="mb-2">Spell Correction</li>
                                  <li class="mb-2">Search Analytics</li>
                                  <li class="mb-2">API</li>
                                  <li class="mb-2">WordPress plug-in</li>
                                  <li class="mb-2">Index size: 5,000 Records</li>
                                  <li class="mb-2">One domain or software</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end of col -->

                    <div class="col-12 col-md-4 reveal">
                        <div class="card text-center mb-40 card--focused ">
                            <div class="header pt-30 pb-30 border-bottom-light">
                                <h2 class="h1-font">$29</h2>
                                <span class="h6-font font-weight-bold">Pro Version</span>
                            </div>
                            <div class="body pb-40 pt-30 pr-30 pl-30">
                                <ul>
                                  <li class="mb-2">Arabic English Search</li>
                                  <li class="mb-2">Auto-complete</li>
                                  <li class="mb-2">Spell Correction</li>
                                  <li class="mb-2">Search Analytics</li>
                                  <li class="mb-2">API</li>
                                  <li class="mb-2">Index size: 10,000 Records</li>
                                  <li class="mb-2">5/$ for each additional 5,000</li>
                                  <li class="mb-2">Maximum 100,000 records</li>
                                  <li class="mb-2">More than one domain or software</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end of col -->

                    <div class="col-12 col-md-4 reveal">
                        <div class="card text-center mb-40">
                            <div class="header pt-30 pb-30 border-bottom-light">
                                <h2 class="h1-font color-primary">custom</h2>
                                <span class="h6-font font-weight-bold">Custom Version</span>
                            </div>
                            <div class="body pb-40 pt-30 pr-30 pl-30">
                                <ul>
                                  <li class="mb-2">Unlimited records</li>
                                  <li class="mb-2">Unlimited API requests</li>
                                  <li class="mb-2">All what is included in Pro-version</li>
                                  <li class="mb-2">On-premises solutions</li>
                                  <li class="mb-2">Additional custom features</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Pricing ============ -->

        <!-- =========== Start of CTA ============ -->
        <section class="bg-color-primary space" id="requestdemo">
            <div class="background-holder background-holder--contain">
                <img src="img/cta-bg.png" alt="pattern" class="background-image-holder">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mx-auto reveal">
                        <h3 class="mb-20">Start Your Free Trial</h3>
                        <p class="mb-3">Fill the form below and Lableb team will get in touch with you shorty after with details about your account.</p>

                        <form class="form form--sm" method="POST">
                            <div class="form-row mb-20">
                                <div class="form-group col-sm-12 col-md-4">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Company Name">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Company Email">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Nmber" required>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                                </div>
                            </div>
                            <div class="form-row mb-20">
                                <div class="form-group col-sm-12">
                                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Want to share any additional information?" required></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 text-center">
                                    <button type="submit" class="btn btn--bg-success btn-splash-hover btn-3d-hover"><span
                                            class="btn__text">Submit</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of CTA ============ -->

        <!-- =========== Start of footer height emulator============ -->
        <!-- this height emulator helps to calculate the fixed footer height  -->
        <div class="height-emulator d-none d-lg-block"></div>
        <!-- =========== End of footer height emulator============ -->

        <!-- =========== Start of Footer ============ -->
        <footer class="footer footer--fixed">
            <div class="background-holder background-holder--contain background-holder--left">
                <img src="img/logo-overlay-big.png" alt="pattern" class="background-image-holder">
            </div>
            <div class="space">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-2 mb-20 mb-lg-0">
                            <span><a href="index.html"><img src="img/logo.png" alt="logo"></a></span>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 mb-20 mb-sm-0">
                            <div class="footer-widget">
                                <h6 class="mb-20">Contact</h6>
                                <ul>
                                    <li>Egypt: +201090044688</li>
                                    <li>KSA  : +966555633423</li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of col -->
                        <div class="col-6 col-sm-4 col-lg-3 mb-20 mb-sm-0">
                            <div class="footer-widget">
                                <ul>
                                    <li>Email: info@jomaan.com</li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of col -->
                    </div>
                    <!-- end of row -->
                </div>
                <!-- end of container -->
            </div>
            <!-- end of main footer -->
            <div class="bg-color-grey py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-md-flex justify-content-between align-items-center">
                            <nav class="nav">
                                <ul class="d-flex mb-md-0">
                                    <li>Made with <i class="fa fa-heart text-danger"></i> in Egypt</li>
                                </ul>
                            </nav>
                            <!-- end of mini footer nav -->
                            <div class="d-flex justify-content-between ml-auto">
                                <!-- end of language selector -->
                                <ul class="social-lists d-flex mb-0">
                                    <!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li> -->
                                </ul>
                                <!-- end of social list -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of container -->
            </div>
            <!-- mini footer end -->
        </footer>
        <!-- =========== End of Footer ============ -->

    </div>

    <script src="js/plugins.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>