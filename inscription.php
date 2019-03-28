<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

?>
<?php require_once'functions.php' ?>
<?php
if(!empty($_POST)){
    $errors= array();
    require_once 'db.php';

    if(empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/',$_POST['nom'])){

        $errors['nom']="Vous n'avez pas renseigné le nom!";
    }else{
        $req= $pdo->prepare('SELECT id FROM users WHERE username=?');
        $req->execute([$_POST['nom']]);
        $user = $req->fetch();
        if ($user) {
            $errors['nom']= 'Ce nom existe déjà';

        }
    }



    if(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/',$_POST['prenom'])){
        $errors['prenom']= "Vous n'avez pas renseigné votre prénom";
    }else{
        $req= $pdo->prepare('SELECT id FROM users WHERE firstname=?');
        $req->execute([$_POST['prenom']]);
        $user = $req->fetch();
        if ($user) {
            $errors['prenom']= 'Ce prénom existe déjà';

        }
    }


    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
        $errors['email']= "Votre email n'est pas valide";
    }else{
        $req= $pdo->prepare('SELECT id FROM users WHERE email=?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if ($user) {
            $errors['email']= 'Ce mail existe déjà';

        }
    }


    if(empty($_POST['password']) || $_POST['password'] != $_POST['password2']){
        $errors['password']= "Mot de passe invalide!";
    }
    if(empty($errors)){
    

    $req= $pdo->prepare("INSERT INTO  users SET username = ? , 
        firstname= ? , password = ? , email=?, confirmation_token=?");
    
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    $token= str_random(60);
    
    $req->execute([$_POST['nom'],$_POST['prenom'],$password,$_POST['email'],$token]);
    $user_id = $pdo->LastInsertId();
    mail($_POST['email'], 'Confirmation de votre compte de souscription à <color:red>MonLogement</color>',
        "Afin de valider votre compte merci
         de cliquer sur ce lien\n\nhttp://localhost/monlogement/confirm.php?id=$user_id&token=$token");
    $_SESSION['flash']['success'] = 'Un email de confirmation vous a 
    été envoyé par email pour valider votre compte';
    header('Location:login.php');
    
    exit();
    


        }
    
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>MonLogement | Inscription</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="h-100 d-md-flex justify-content-between align-items-center">
                <div class="email-address">
                    <a href="mailto:contact@southtemplate.com">monlogement@contact.com</</a>
                </div>
                <div class="phone-number d-flex">
                    <div class="icon">
                        <img src="img/icons/phone-call.png" alt="">
                    </div>
                    <div class="number">
                        <a href="tel:+45 677 8993000 223">+225 772 634 30</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="index.html">Accueil</a></li>
                                <li><a href="#">Compte</a>
                                    <ul class="dropdown">
                                        <li><a href="login.html">Se connecter</a></li>
                                        <li><a href="inscription.html">S'inscrire</a></li>
                                        <!-- <li><a href="#">Listings</a>
                                            <!--<ul class="dropdown">
                                                <li><a href="listings.html">Listings</a></li>
                                                <li><a href="single-listings.html">Single Listings</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Blog</a>
                                            <ul class="dropdown">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Single Blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li-->
                                    </ul>
                                </li>
                                <li><a href="#">Déposer une annonce</a></li>
                                <li><a href="about-us.html">A propos</a></li>
                                <!--<li><a href="blog.html">Blog</a></li>
                                <li><a href="#">Mega Menu</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Headline 1</li>
                                            <li><a href="#">Mega Menu Item 1</a></li>
                                            <li><a href="#">Mega Menu Item 2</a></li>
                                            <li><a href="#">Mega Menu Item 3</a></li>
                                            <li><a href="#">Mega Menu Item 4</a></li>
                                            <li><a href="#">Mega Menu Item 5</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Headline 2</li>
                                            <li><a href="#">Mega Menu Item 1</a></li>
                                            <li><a href="#">Mega Menu Item 2</a></li>
                                            <li><a href="#">Mega Menu Item 3</a></li>
                                            <li><a href="#">Mega Menu Item 4</a></li>
                                            <li><a href="#">Mega Menu Item 5</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Headline 3</li>
                                            <li><a href="#">Mega Menu Item 1</a></li>
                                            <li><a href="#">Mega Menu Item 2</a></li>
                                            <li><a href="#">Mega Menu Item 3</a></li>
                                            <li><a href="#">Mega Menu Item 4</a></li>
                                            <li><a href="#">Mega Menu Item 5</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Headline 4</li>
                                            <li><a href="#">Mega Menu Item 1</a></li>
                                            <li><a href="#">Mega Menu Item 2</a></li>
                                            <li><a href="#">Mega Menu Item 3</a></li>
                                            <li><a href="#">Mega Menu Item 4</a></li>
                                            <li><a href="#">Mega Menu Item 5</a></li>
                                        </ul>
                                    </div>
                                </li>-->
                                <li><a href="contact.html">Contact</a></li>
                            </ul>

                            <!-- Search Form -->
                            <div class="south-search-form">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Search Anything ...">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <!-- Search Button -->
                            <a href="#" class="searchbtn"><i class="fa" aria-hidden="true"></i></a>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">INSCRIPTION</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <section class="south-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-heading">
                        <h6>Inscription</h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="content-sidebar">
                        <!-- Office Hours -->
                       <!-- <div class="weekly-office-hours">
                            <ul>
                                <li class="d-flex align-items-center justify-content-between"><span>Monday - Friday</span> <span>09 AM - 19 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Saturday</span> <span>09 AM - 14 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Sunday</span> <span>Closed</span></li>
                            </ul>
                        </div>-->
                        <!-- Address -->
                        <!--<div class="address mt-30">
                            <h6><img src="img/icons/phone-call.png" alt=""> +225 772 634 30</h6>
                            <h6><img src="img/icons/envelope.png" alt=""> monlogement@contact.com</h6>
                            <h6><img src="img/icons/location.png" alt=""> Mamie Adjoua,Yopougon,<br> Abidjan, CI,</h6>
                        </div>-->
                    </div>
                </div>

                <!-- Contact Form Area -->
                <div class="col-12 col-lg-8">

                    <div class="contact-form">
                        <?php  if(!empty($errors)):?>
                        <div class="alert alert-danger">
                            <p>Vous n'avez pas remplis correctement le formulaire</p>
                            <ul>
                            <?php foreach($errors as $error):?> 
                            <li><?= $error ;?></li>

                            <?php endforeach; ?>
                        </ul>
                        </div>
                       <?php endif; ?>
                        <form action="inscription.php" method="post">
							<div class="control-group">
								<select class="span1" name="days">
									<option value="1">Mr.</option>
									<option value="2">Mme</option>
									<option value="3">Mlle</option>
								</select>
							</div>
                            <!--<div class="form-group">
                                <input type="number" class="form-control" name="number" id="contact-number" placeholder="phone">
                            </div>-->
                            <div class="form-group">
                                <input type="text" class="form-control" name="nom" id="contact-name" placeholder="Votre Nom">
                            </div>
							<div class="form-group">
                                <input type="text" class="form-control" name="prenom" id="contact-name" placeholder="Vos prenoms">
                            </div>
							<!--<div class="form-group">
                                <input type="name" class="form-control" name="name" id="city-name" placeholder="Adresse">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="number" id="contact-number" placeholder="Téléphone">
                            </div>-->
							<div class="form-group">
                                <input type="text" class="form-control" name="email" id="contact-email" placeholder="Votre Email">
                            </div>
							<div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Entrez un mot de passe">
                            </div>
							<div class="form-group">
                                <input type="password" class="form-control" name="password2" id="password" placeholder="Confirmez le mot de passe">
                            </div>
							<p>Vos informations ci-dessus resteront confidentielles</p>
                            <!--<div class="form-group">
                                <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Votre Message"></textarea>
                            </div>-->
                            <button type="submit" class="btn south-btn">S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <?php if(isset($_SESSION['flash'])) :?>
    <?php foreach ($_SESSION['flash'] as $type=>$message):?>
    <div class="alert alert-<?= $type; ?>">
        <?= $message; ?>
    </div>
<?php endforeach ; ?>
<?php unset($_SESSION['flash']); ?>
<?php endif ; ?>


    <!-- Google Maps -->
    <div class="map-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="googleMap" class="googleMap"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Footer Area Start ##### -->
   <footer class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image: url(img/bg-img/cta.jpg);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area mb-100">
                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>A propos de nous</h6>
                            </div>

                            <!--<img src="img/bg-img/footer.jpg" alt="">-->
                            <div class="footer-logo my-4">
                                <img src="img/core-img/logo.png" alt="">
                            </div>
                            <p>Nous vous facilitons la tâche dans la recherche de vos espaces immobiliers a travers ce site.</p>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area mb-100">
                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>Contactez-Nous</h6>
                            </div>
                            <!-- Office Hours -->
                           <!-- <div class="weekly-office-hours">
                                <ul>
                                    <li class="d-flex align-items-center justify-content-between"><span>Monday - Friday</span> <span>09 AM - 19 PM</span></li>
                                    <li class="d-flex align-items-center justify-content-between"><span>Saturday</span> <span>09 AM - 14 PM</span></li>
                                    <li class="d-flex align-items-center justify-content-between"><span>Sunday</span> <span>Closed</span></li>
                                </ul>
                            </div>-->
                            <!-- Address -->
                            <div class="address">
                                <h6><img src="img/icons/phone-call.png" alt=""> +225 772 634 30</h6>
                                <h6><img src="img/icons/envelope.png" alt=""> monlogement@contact.ci</h6>
                                <h6><img src="img/icons/location.png" alt=""> Mamie Adjoua,Yopougon, Abidjan, CI</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area mb-100">
                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>Liens</h6>
                            </div>
                            <!-- Nav -->
                            <ul class="useful-links-nav d-flex align-items-center">
                                <li><a href="#">Accueil</a></li>
                                <li><a href="#">A propos</a></li>
                                <li><a href="#">Services Immobiliers</a></li>
                                <li><a href="#">Les Annonces</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area mb-100">
                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>Propriété en vedette</h6>
                            </div>
                            <!-- Featured Properties Slides -->
                            <div class="featured-properties-slides owl-carousel">
                                <!-- Single Slide -->
                                <div class="single-featured-properties-slide">
                                    <a href="#"><img src="img/bg-img/fea-product.jpg" alt=""></a>
                                </div>
                                <!-- Single Slide -->
                                <div class="single-featured-properties-slide">
                                    <a href="#"><img src="img/bg-img/fea-product.jpg" alt=""></a>
                                </div>
                                <!-- Single Slide -->
                                <div class="single-featured-properties-slide">
                                    <a href="#"><img src="img/bg-img/fea-product.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Copywrite Text -->
        <div class="copywrite-text d-flex align-items-center justify-content-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tout droits réservé<i class="fa fa-heart-o" aria-hidden="true"><!--</i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>-->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <script src="js/classy-nav.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <!-- Google Maps -->
    <!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="js/map-active.js"></script-->

</body>

</html>
