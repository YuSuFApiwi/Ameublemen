<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Ameublement - Form Salone Moderne</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.main.css">
</head>
<body>

    <div class="container">
        <h1>Demandez le produit maintenant</h1>
        <form method="POST" name="form"  id="form" enctype="multipart/form-data" onsubmit="return false;">
            <section class="row">
                <div class="col-md-6 col-sm-6">
                    <h3>Forme Salon moderne.</h3>
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
                </div>
                
                <input type="hidden" name="url" value="<?php echo isset($_GET["url"])?$_GET["url"]:"https://iyaameublement.com/" ?>" id="url"/>
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
                <span class="lead">Choisir les tissus :</span>
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
                        </div>  
                    </div>
                </div>
            </section>

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


    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-select.js" type="text/javascript"></script>
    <script src="js/script-select.js" type="text/javascript"></script>
    <script src="js/script.main.js" type="text/javascript"></script>

</body>
</html>