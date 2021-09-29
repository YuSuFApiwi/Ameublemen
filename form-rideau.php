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

    <div class="container">
        <h1>Demandez le produit maintenant</h1><!-- onsubmit="return false;" -->
        <form action="response-rideau.php" method="POST" name="form"  id="form" enctype="multipart/form-data">
            <section class="row">
                <div class="col-md-6 col-sm-6">
                <h3 class="lead">Cotations salon «Dimensions» <span class="text-danger">RIDEAU 710S</span></h3>
                    <div class="dimension-rideau">
                    <div class="col-md-12 text-uppercase mb-5">
                        <div class="col-xs-4 fa-2x">Largeur:</div>
                        <div class="col-xs-6">
                            <input type="number" class="form-control" step="0.01" placeholder="Largeur" min="1" name="largeur" id="largeur" required='required'>
                        </div>
                        <div class="col-xs-2 fa-2x">ML</div>
                    </div>
                    <div class="col-md-12 text-uppercase mb-5">
                        <div class="col-xs-4 fa-2x">Hauteur:</div>
                        <div class="col-xs-6">
                            <input type="number" class="form-control" step="0.01" placeholder="Hauteur" min="1" name="hauteur" id="hauteur" required='required'>
                        </div>
                        <div class="col-xs-2 fa-2x">ML</div>
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
                            <a  class="panel-title accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#liste-tringle" aria-expanded="true">
                                <span>Tringle</span>
                                <i class="fa fa-plus pull-right"></i>
                            </a>
                            </div>
                            <div id="liste-tringle" class="panel-collapse collapse">
                                <select class="image-picker text-center select-table" id="tringle" name="tringle">
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
                                <label class="col-form-label-xs"><input type="number" class="form-control" min="1" max="100" placeholder="Qté" name="qte_tringle" id="qte_tringle"></label>
                            </div>
                        </div>
                        <div class="col-xs-8 panel panel-default list-group">
                            <div class="panel-heading">
                                <a  class="panel-title accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#liste-parte_embrasse" aria-expanded="true">
                                    <span>Porte embrasse</span>
                                    <i class="fa fa-plus pull-right"></i>
                                </a>
                            </div>
                            <div id="liste-parte_embrasse" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <select class="image-picker text-center select-table" id="tringle" name="tringle">
                                    <option value="" hidden></option>
                                    <option data-img-src="images/formule/formule/rideau/Embrasse/EM001.jpg" data-img-alt="Table-Réf-TS520" value="TS520">Table Réf - TS520</option>
                                    <option data-img-src="images/formule/formule/rideau/Embrasse/EM002.jpg" data-img-alt="Table-Réf-TS852" value="TS852">Table Réf - TS852</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label class="col-form-label-xs"><input type="number" class="form-control" min="1" max="100" placeholder="Qté" name="qte_parte_embrasse" id="qte_parte_embrasse"></label>
                            </div>
                        </div>
                        <div class="col-xs-8 panel panel-default list-group">
                            <div class="panel-heading">
                            <a  class="panel-title accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#liste-embrasse" aria-expanded="true">
                                <span>Embrasse</span>
                                <i class="fa fa-plus pull-right"></i>
                            </a>
                            </div>
                            <div id="liste-embrasse" class="panel-collapse collapse">
                                <select class="image-picker text-center select-table" id="embrasse" name="embrasse">
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
                                <label class="col-form-label-xs"><input type="number" class="form-control" min="1" max="100" placeholder="Qté" name="qte_embrasse" id="qte_embrasse"></label>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="form-group">
                                <input type="file" name="join_img" id="join_img" class="form-control">
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