<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Ameublement-2021</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.main.css">
</head>
<body>

    <header class="header">
        <div class="container header-top">
            <div class="row font-size-2">
                <div class="top p-2 col-lg-8 d-xl-block d-none text-uppercase">
                    <i class="fa fa-map-marker"></i> <span class="mr-1">Porte de Marrakech N102, Maroc</span>
                    <i class="fa fa-phone"></i> <span>+212688827249</span>
                </div>
                <div class="top p-2 col-lg-4 col-sm-12 text-center">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <!-- here menu -->
        <div class="header-img marocain">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand" href="#">
                        <i class="fa fa-user-circle"></i> Apiwi
                        <!-- <img src="#" height="30px" alt="logo iyaameublement"> -->
                    </a>
                </div>

                <!-- class="active" -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="form-salon-moderne.php">Salon Moderne</a></li>
                    <li><a href="form-salon-moderne.php">Rideau</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nos Catalogue <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php">Salon marocain</a></li>
                            <li><a href="form-salon-moderne.php">Salon moderne</a></li>
                            <li><a href="#">Chambre à coucher</a></li>
                            <li><a href="#">Rideau et voilage</a></li>
                            <li><a href="#">Tissus</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Accessoires divers</a></li>
                        </ul>
                    </li>
                    <li><a href="#">shop</a></li>
                    <li><a href="#">Nos Réalisations</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
            <div class="content-header">
                <h1 class="text-uppercase text-center hedding">Salon Marocain</h1>
            </div>
        </div>
        
    </header>

    <div class="container">
        <h1>Demandez le produit maintenant</h1>
        <form method="POST" name="form"  id="form" enctype="multipart/form-data" onsubmit="return false;">
            <section class="row">
                <div class="col-md-6 col-sm-6">
                    <h3>Forme Salon.</h3>
                    <div class="form-group">
                        <select class="form-control selectpicker" onchange="afficherforme(this)" id="forme-salon" name="forme_salon">
                        <option value="U" data-thumbnail="images/forme/forme-u.PNG">Salon de forme « U »</option>
                        <option value="L" data-thumbnail="images/forme/forme-l.PNG">Salon de forme « L »</option>
                        <option value="G" data-thumbnail="images/forme/forme-g.PNG">Salon de forme « G »</option>
                        <option value="C" data-thumbnail="images/forme/forme-c.PNG">Salon de forme « C »</option>
                        <option value="choix forme image" data-content="<input type='file' class='form-control' title='Autre Forme Salone' id='forme-image' name='forme_image'/>"></option>                      
                        </select>
                    </div>
                    <div class="dimension-box">
                        <h2 class="text-danger">SALON DE FORME (<span class="type-forme-demension">U</span>) :</h2>
                        <h3>Cotations salon «Dimensions»</h3>
                        <div>
                            <div class="form-group row dimension"><!-- afficher les linge forme salone --></div>
                        </div>
                    </div>
                    
                    <div class="type">
                        <div class="form-group">
                            <span class="lead">Type banquette :</span>
                            <select class="form-control" id="type-banquette" name="type_banquette" required="required">
                                <option value="" hidden>Sélect type banquette</option>
                                <option value="Banquette à ressorts">Banquette à ressorts</option>
                                <option value="Banquette en mousse">Banquette en mousse</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="ref" value="<?php echo isset($_GET["ref"])?$_GET["ref"]:"ASSIA0253" ?>" id="ref"/>
                <div class="col-md-6 col-sm-4">
                    <h3>Eléments à intégrer dans le salon.</h3>
                    <div class="panel-group" id="accordion">
                        <div class="col-xs-8 panel panel-default list-group">
                            <div class="panel-heading">
                            <a  class="panel-title accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#liste-table" aria-expanded="true">
                                <span>Table</span>
                                <i class="fa fa-plus pull-right"></i>
                            </a>
                            </div>
                            <div id="liste-table" class="panel-collapse collapse">
                                <select class="image-picker text-center select-table" id="table" name="table">
                                    <option value="" hidden></option>
                                    <option data-img-src="images/tables/table-ts520.png" data-img-alt="Table-Réf-TS520" value="TS520">Table Réf - TS520</option>
                                    <option data-img-src="images/tables/table-ts852.png" data-img-alt="Table-Réf-TS852" value="TS852">Table Réf - TS852</option>
                                    <option data-img-src="images/tables/table-ts758s.png" data-img-alt="Table-Réf-TS852" value="TS758S">Table Réf - TS852</option>
                                    <option data-img-src="images/tables/table-s752.png" data-img-alt="Table-Réf-S752" value="S752">Table Réf - &ThickSpace;&ThickSpace;S752</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label class="col-form-label-xs"><input type="number" class="form-control" min="1" max="100" placeholder="Qté" name="qte_table" id="qte_table"></label>
                            </div>
                        </div>
                        <div class="col-xs-8 panel panel-default list-group">
                            <div class="panel-heading">
                            <a  class="panel-title accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#liste-cendrier" aria-expanded="true">
                                <span>Cendrier</span>
                                <i class="fa fa-plus pull-right"></i>
                            </a>
                            </div>
                            <div id="liste-cendrier" class="panel-collapse collapse">
                            <div class="panel-body">
                                <select class="image-picker text-center select-coin" id="cendrier" name="cendrier">
                                    <option value="" hidden></option>
                                    <option data-img-src="images/cendrier/cendrier-5520.png" data-img-alt="Cendrier-Réf-5520" value="5520">Cendrier Réf - 5520</option>
                                    <option data-img-src="images/cendrier/cendrier-55s4.png" data-img-alt="Cendrier-Réf-55S4" value="55S4">Cendrier Réf - 55S4</option>
                                    <option data-img-src="images/cendrier/cendrier-452d.png" data-img-alt="Cendrier-Réf-452D" value="452D">Cendrier Réf - 452D</option>
                                    <option data-img-src="images/cendrier/cendrier-5523.png" data-img-alt="Cendrier-Réf-5523" value="5523">Cendrier Réf - 5523</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label class="col-form-label-xs"><input type="number" class="form-control col-3" min="1" max="100" placeholder="Qté" name="qte_cendrier" id="qte_cendrier"></label>
                            </div>
                        </div>
                        <div class="col-xs-8 panel panel-default list-group">
                            <div class="panel-heading">
                                <a  class="panel-title accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#liste-coin" aria-expanded="true">
                                    <span>Coin</span>
                                    <i class="fa fa-plus pull-right"></i>
                                </a>
                            </div>
                            <div id="liste-coin" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <select class="image-picker text-center select-coin" id="coin" name="coin">
                                        <option value="" hidden></option>
                                        <option data-img-src="images/coin/coin-145.png" data-img-alt="coin-Réf-145" value="145">Coin Réf - 145</option>
                                        <option data-img-src="images/coin/coin-125.png" data-img-alt="coin-Réf-125" value="125">Coin Réf - 125</option>
                                        <option data-img-src="images/coin/coin-112.png" data-img-alt="coin-Réf-112" value="112">Coin Réf - 112</option>
                                        <option data-img-src="images/coin/coin-582.png" data-img-alt="coin-Réf-582" value="582">Coin Réf - 582</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="url" value="<?php echo isset($_GET["url"])?$_GET["url"]:"https://iyaameublement.com/" ?>" id="url"/>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label class="col-form-label-xs"><input type="number" class="form-control" min="1" max="100" placeholder="Qté" name="qte_coin" id="qte_coin"></label>
                            </div>
                        </div>
                        <div class="col-xs-8 panel panel-default list-group">
                            <div class="panel-heading">
                                <a  class="panel-title accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#liste-accoudoir" aria-expanded="true">
                                    <span>Accoudoir</span>
                                    <i class="fa fa-plus pull-right"></i>
                                </a>
                            </div>
                            <div id="liste-accoudoir" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <select class="image-picker text-center select-coin" id="accoudoir" name="accoudoir">
                                        <option value="" hidden></option>
                                        <option data-img-src="images/accoudoir/accoudoir-852.png" data-img-alt="accoudoir-Réf-852" value="852">Coin Réf - 852</option>
                                        <option data-img-src="images/accoudoir/accoudoir-845.png" data-img-alt="accoudoir-Réf-845" value="845">Coin Réf - 845</option>
                                        <option data-img-src="images/accoudoir/accoudoir-852.png" data-img-alt="accoudoir-Réf-892" value="892">Coin Réf - 892</option>
                                        <option data-img-src="images/accoudoir/accoudoir-852.png" data-img-alt="accoudoir-Réf-842" value="842">Coin Réf - 842</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label class="col-form-label-xs"><input type="number" class="form-control" min="1" max="100" placeholder="Qté" name="qte_accoudoir" id="qte_accoudoir"></label>
                            </div>
                        </div>                    
                    </div>                          
                </div>
            </section><!-- row -->

            <section>
                <span class="lead">Tissus préférez</span>
                    <div class="row">
                    <div class="col-md-3">
                        <div class="panel-group" id="accordion-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-heading mb-1">
                                    <a  class="panel-title acc-horizontal-toggle accordion-toggle" data-toggle="collapse" data-parent="#accordion-horizontal" href="#liste-brocard" aria-expanded="true">
                                        <span>Tissus brocard</span>
                                        <i class="fa fa-angle-double-right pull-right"></i>
                                    </a>
                                </div>
                                <div class="panel-heading mb-1">
                                    <a  class="panel-title acc-horizontal-toggle accordion-toggle" data-toggle="collapse" data-parent="#accordion-horizontal" href="#t-brode" aria-expanded="true">
                                        <span>Tissus brodé</span>
                                        <i class="fa fa-angle-double-right pull-right"></i>
                                    </a>
                                </div>
                                <div class="panel-heading">
                                    <a  class="panel-title acc-horizontal-toggle accordion-toggle" data-toggle="collapse" data-parent="#accordion-horizontal" href="#t-toile" aria-expanded="true">
                                        <span>Tissus toile</span>
                                        <i class="fa fa-angle-double-right pull-right"></i>
                                    </a>
                                </div>
                                <div class="panel-heading">
                                    <a  class="panel-title acc-horizontal-toggle accordion-toggle" data-toggle="collapse" data-parent="#accordion-horizontal" href="#t-imprime" aria-expanded="true">
                                        <span>Tissus imprimé</span>
                                        <i class="fa fa-angle-double-right pull-right"></i>
                                    </a>
                                </div>             
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div id="liste-brocard" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <select class="image-picker show-labels show-html liste-tissus" multiple="multiple" id="tissus-brocard" name="tissus_brocard[]">
                                        <option data-img-src="images/Tissus/BK8552.png" value="BK8552">Réf : BK8552</option>
                                        <option data-img-src="images/Tissus/BR8503.png" value="BR8503">Réf : BR8503</option>
                                        <option data-img-src="images/Tissus/BR8574.png" value="BR8574">Réf : BR8574</option>
                                        <option data-img-src="images/Tissus/BR8510.png" value="BR8510">Réf : BR8510</option>
                                        <option data-img-src="images/Tissus/BR8593.png" value="BR8593">Réf : BR8593</option>
                                    </select>
                                </div>
                            </div>
                            <div id="t-brode" class="panel-collapse collapse">
                                <div class="panel-body">
                                    item 2
                                </div>
                            </div>
                            <div id="t-toile" class="panel-collapse collapse">
                                <div class="panel-body">
                                    item 3
                                </div>
                            </div>
                            <div id="t-imprime" class="panel-collapse collapse">
                                <div class="panel-body">
                                    item 4
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </section>

            <section class="row">
                <div class="col-md-6">
                    <span class="lead">Type de bois</span>
                    <div class="panel-group" id="accordion-type-bois">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <a  class="panel-title accordion-toggle" data-toggle="collapse" data-parent="#accordion-type-bois" href="#acc-type-bois" aria-expanded="true">
                                <span>Type de bois</span>
                                <i class="fa fa-plus pull-right"></i>
                            </a>
                            </div>
                            <div id="acc-type-bois" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="panel-body">
                                        <select class="image-picker show-labels show-html text-center" id="type-bois" name="type_bois">
                                            <option value="" hidden></option>
                                            <option data-img-src="images/type_bois/Peuplier.png" data-img-alt="Peuplier 1" value="Peuplier">Peuplier</option>
                                            <option data-img-src="images/type_bois/heter.png" data-img-alt="Hétre 2" value="Hétre">Hétre</option>
                                            <option data-img-src="images/type_bois/pin.png" data-img-alt="Pin 3" value="Pin">Pin</option>
                                            <option data-img-src="images/type_bois/chene.png" data-img-alt="Chéne 4" value="Chéne">Chéne</option>
                                            <option data-img-src="images/type_bois/orma.png" data-img-alt="Orme 5" value="Orme">Orme</option>
                                            <option data-img-src="images/type_bois/sapin.png" data-img-alt="Sapin 6" value="Sapin">Sapin</option>
                                            <option data-img-src="images/type_bois/pin_douglas.png" data-img-alt="Palissande 11" value="Palissande">Palissande</option>
                                            <option data-img-src="images/type_bois/acaci.png" data-img-alt="Pin Douglas 7" value="Pin Douglas">Pin Douglas</option>
                                            <option data-img-src="images/type_bois/teck.png" data-img-alt="Acacia 8" value="Acacia">Acacia</option>
                                            <option data-img-src="images/type_bois/noyer.png" data-img-alt="Teck 9" value="Teck">Teck</option>
                                            <option data-img-src="images/type_bois/palissandre.png" data-img-alt="Noyer 10" value="Noyer">Noyer</option>
                                            <option data-img-src="images/type_bois/wnrge.png" data-img-alt="Wengé 12" value="Wengé">Wengé</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="lead">Texture bois</span>
                    <div class="panel-group" id="accordion-texture-bois">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <a  class="panel-title accordion-toggle" data-toggle="collapse" data-parent="#accordion-texture-bois" href="#acc-texture-bois" aria-expanded="true">
                                <span>Type de bois</span>
                                <i class="fa fa-plus pull-right"></i>
                            </a>
                            </div>
                            <div id="acc-texture-bois" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <select class="image-picker text-center select-texture" id="texture-bois" name="texture_bois">
                                        <option value="" hidden></option>
                                        <option data-img-src="images/texture/texture-s10.png" data-img-alt="texture-Réf-S10" value="S10">S10</option>
                                        <option data-img-src="images/texture/texture-s12.png" data-img-alt="texture-Réf-S12" value="S12">S12</option>
                                        <option data-img-src="images/texture/texture-s41.png" data-img-alt="texture-Réf-S41" value="S41">S41</option>
                                        <option data-img-src="images/texture/texture-s45.png" data-img-alt="texture-Réf-S45" value="S45">S45</option>
                                        <option data-img-src="images/texture/texture-s55.png" data-img-alt="texture-Réf-S55" value="S55">S55</option>
                                        <option data-img-src="images/texture/texture-s61.png" data-img-alt="texture-Réf-S61" value="S61">S61</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- row -->

            <section class="row">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom & Prénom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom & Prénom" required="required">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telephone">Téléphone <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="telephone" required="required">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="email">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required="required">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Addresse">Addresse <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="addresse" name="addresse" placeholder="Address" rows="3" required="required"></textarea>
                    </div>
                </div>
            </section><!-- row -->

            <section class="row mb-2">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-sand form-control buttonload"  id="submit">Validation</button>
                </div>
            </section><!-- End row -->
        </form>
        <div class="msg text-center"></div>
    </div>


    <footer>
        <div class="text-center">
            <div class="footer" style="padding: 30px;">
                <ul class="text-uppercase list-group list-inline list-unstyled">
                    <li class="style-none"><a href="https://iyaameublement.com/qui-sommes-nous/">Qui sommes-nous?</a></li>
                    <li class=""><a href="https://iyaameublement.com/conditions-generales/">Conditions générales</a></li>
                    <li class=""><a href="https://iyaameublement.com/contact/">Contact</a></li>
                </ul>
            </div>
            <div class="p-2 header">
                Copyright © <?php echo date("20y"); ?> Tous droits réservés. Créé par <a href="http://webmarko.com">www.kechweb.ma</a>
            </div>
        </div>
    </footer>


    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-select.js" type="text/javascript"></script>
    <script src="js/script-select.js" type="text/javascript"></script>
    <script src="js/script.main.js" type="text/javascript"></script>
</body>
</html>