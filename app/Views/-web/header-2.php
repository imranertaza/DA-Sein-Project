<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DA-SEIN</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url()?>/uploads/favicon.jpg" rel="icon">

    <link href="<?php echo base_url()?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url()?>/assets/css/style.css" rel="stylesheet">

</head>

<body>

<header id="header" class="header fixed-top">
    <div class="site-nav">
        <a href="<?php echo base_url()?>" class="logo"><img src="<?php echo base_url()?>/assets/logo.png" alt="" width="100" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link active" href="<?php echo base_url()?>/Home/news">News</a></li>
                <li><a class="nav-link" href="<?php echo base_url()?>/Home/work">Work</a></li>
                <li><a class="nav-link" href="<?php echo base_url()?>/Home/office">Office</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
    <?php if ($slug == 'news'){ ?>
    <nav class="trans-nav">
        <div class="trans-nav-wrapper">
            <ul class="anchor-nav">
                <?php foreach ($news as $row){ ?>
                <li><a class="scrollto active" href="#section-<?php echo $row->years; ?>" title="<?php echo $row->years; ?>"><?php echo $row->years; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <?php } ?>
    <?php if ($slug == 'office'){ ?>
    <nav class="trans-nav">
        <div class="trans-nav-wrapper">
            <ul class="anchor-nav">
                <li><a class="scrollto" href="#section-profile">Profile</a></li>
                <li><a class="scrollto" href="#section-contact">Contact</a></li>
                <li><a class="scrollto" href="#section-employment">Employment</a></li>
                <li><a class="scrollto" href="#section-people">People</a></li>
                <li><a class="scrollto" href="#section-publications">Publications</a></li>
                <li><a class="scrollto" href="#section-clients">Clients</a></li>
                <li><a class="scrollto" href="#section-events">Events</a></li>
                <li><a class="scrollto" href="#section-podcasts">Podcasts</a></li>
                <li><a class="scrollto" href="#section-awards">Awards</a></li>
            </ul>
        </div>
    </nav>
    <?php } ?>

</header>

