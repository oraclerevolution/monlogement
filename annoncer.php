<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>MonLogement | Déposer une annonce</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/mystyle.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <?php include "scripts/header.php"; ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Déposez votre annonce immobilière</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <section class="info_perso south-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-heading">
                        <h6>Renseignements Personnel</h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="content-sidebar">
                        <!-- Office Hours -->
                       
                    </div>
                </div>

                <!-- Contact Form Area -->
                <div class="col-12 col-lg-8">
                    <div class="contact-form">
                        <form action="#" method="post">
							<div class="control-group">
								<select class="span1" name="genre">
									<option value="mr">Mr.</option>
									<option value="mme">Mme</option>
									<option value="mlle">Mlle</option>
								</select>
							</div>
                            <div class="form-group">
                                <input type="name" class="form-control" name="nom"  placeholder="Votre Nom">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="prenoms"  placeholder="Vos prenoms">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="number"  placeholder="Numéro de Téléphone">
                            </div>
							<div class="form-group">
                                <input type="email" class="form-control" name="email" id="contact-email" placeholder="Votre Email">
                            </div>
							
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<section class="south-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-heading">
                        <h6>Descriptions du bien</h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="content-sidebar">
                        <!-- Office Hours -->
                       
                    </div>
                </div>

                <!-- Contact Form Area -->
                <div class="col-12 col-lg-8">
                    <div class="contact-form">
                        <form action="#" method="post">
							<div class="control-group">
								<select class="span1" name="type_biens">
									<option value="0">Type de bien</option>
									<option value="maison">Maison</option>
									<option value="villa">Villa</option>
									<option value="appartement">Appartement</option>
									<option value="studio">Studio</option>
									<option value="bureau">Bureau</option>
									<option value="magasin">Magasin</option>
									<option value="salle_evenement">Salle d'évènements</option>
									<option value="terrain">Terrain</option>
								</select>
							</div>
                            <div class="form-group">
                                <input type="name" class="form-control" name="lieu"  placeholder="Ville ou Commune">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="quartier"  placeholder="Le quartier">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="surface"  placeholder="surface en m²">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="nb_pieces"  placeholder="Nombre de pièces">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="nb_chambre"  placeholder="Nombre de chambre">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="nb_salon"  placeholder="Nombre de salon">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="nb_douche"  placeholder="Nombre de Salle de bain">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="nb_toilette"  placeholder="Nombre de Toilette">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="prix_loyer"  placeholder="Prix ou loyer">
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="prix_caution"  placeholder="Caution">
                            </div>
							<div class="control-group" style="border-bottom:5px;">
								<select class="span1" name="meuble">
									<option value="0">Votre propriété est-elle meublé ?</option>
									<option value="oui">Oui</option>
									<option value="non">Non</option>
								</select>
							</div>
							<div class="form-group">
                                <textarea class="form-control" name="description" id="message" cols="30" rows="10" placeholder="Autres Descriptions du bien."></textarea>
                            </div>
							<div class="form-group">
                                <input type="name" class="form-control" name="number"  placeholder="Date de disponibilité ex(JJ/MM/AA)">
                            </div>
                            <p>Chargez trois (3) photos de votre propriété</p>							
                            <div class="form-group">
                                <input type="file" name="photo1" id=""><br>
                                <p style='color:red'>Formats souhaités: jpeg, jpg, png</p>
                                <input type="file" name="photo2" id=""><br>
                                <p style='color:red'>Formats souhaités: jpeg, jpg, png</p>
                                <input type="file" name="photo3" id=""> <br>
                                <p style='color:red'>Formats souhaités: jpeg, jpg, png</p>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" value="VALIDER MON ANNONCE">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tout droits réservés
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="js/map-active.js"></script>

</body>

</html>
