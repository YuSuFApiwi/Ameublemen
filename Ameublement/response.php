<?php
    use PHPMailer\PHPMailer\PHPMailer;
date_default_timezone_set("Africa/Algiers");
$forme_Salone = ['U'=>['A','B','C'],'L'=>['A','B'],'G'=>['A','B','C','D','E'],'C'=>['A','B','C']];

/* Start */
$body = '<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demande de prix - Commande</title>
    <meta http-equiv="Content-Type" content="text/html"/>
    <meta charset="UTF-8">
	<style media="all">
		*{
			margin: 0;
			padding: 0;
			line-height: 1.3;
			font-family: sans-serif;
			color: #333542;
		}
		body{font-size: .875rem;}
		.gry-color *,.gry-color{color:#878f9c;}
        .black-color{color: #010;}.red-color{color:red}
		table{width: 100%;}
		table th{font-weight: normal;}
		table.padding th{padding: .5rem .7rem;}
		table.padding td{padding: .7rem;}
		table.sm-padding td{padding: .2rem .7rem;}
		.border-bottom td,
		.border-bottom th{border-bottom:1px solid #f2f2f2;}
        .text-upper{text-transform: uppercase;}.text-center{text-align: center;}
		.text-left{text-align:left;}
		.text-right{text-align:right;}.strong{font-weight: bold;}
		.small{font-size: .85rem;}img{float: right;}
	</style>
</head>
<body><div style="margin-left:auto;margin-right:auto;">';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $nom = isset($_POST["nom"])?filter_var($_POST["nom"],FILTER_SANITIZE_STRING):"";
    $telephone = isset($_POST["telephone"])?filter_var($_POST["telephone"],FILTER_SANITIZE_NUMBER_INT):"";
    $addresse = isset($_POST["addresse"])?filter_var($_POST["addresse"],FILTER_SANITIZE_STRING):"";
    if (!empty($nom) && !empty($telephone) && !empty($addresse)) {
        $body .= '<div style="background: #f2f2f2;padding: 1.5rem;">
        <table>
            <tr>
                <td style="font-size: 2rem;" class="text-left text-upper">Demande de prix</td>
                <td>
                    <img src="images/logo.png" class="text-right" width="130px" height="50px" style="display:inline-block;">
                </td>
            </tr>
        </table>
        <table>
                <tr>
                    <td style="font-size: 1.2rem;" class="strong gry-color">Mr.<span class="text-upper black-color">'.$nom.'</span></td>
                    <td class="text-right"></td>
                </tr>
                <tr>
                    <td class="gry-color">Adresse : <span class="strong black-color">'.$addresse.'</span></td>
                    <td class="text-right"><span class="strong">N°DP896323</span></td>
                </tr>
                <tr>
                    <td class="gry-color">Téléphone : <span class="strong black-color">'.$telephone.'</span></td>
                    <td class="text-right gry-color">Date : <span class="strong black-color">'.date("d-m-20y - H:i:s").'</span></td>
                </tr>
        </table></div>
        <div style="padding: 1.5rem;padding-bottom: 0">
            <h3 class="gry-color text-center" style="background: #f2f2f2;padding:10px">Désignation : SALON MAROCAIN REF <span class="strong black-color">ASSIA0253</span></h3>
        </div>
	    <div style="padding: 1.5rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr>
	                    <th width="25%" style="background: #f2f2f2;">Croquis de salon et cotations</th>
                        <th width="75%" style="background: #f2f2f2;">Dimension Forme de salon : <span class="strong red-color">'.$_POST["forme_salon"].'</span></th>
	                </tr>
				</thead>
				<tbody class="strong">';
                $ligne_forme = "";
                for ($i=0; $i < count($forme_Salone[$_POST["forme_salon"]]); $i++) { 
                    $ligne_forme .= '<tr class="strong"><td class="gry-color">Linge « '.$forme_Salone[$_POST["forme_salon"]][$i].' »</td>
                        <td class="strong black-color">'.$_POST["forme_linge_" . $forme_Salone[$_POST["forme_salon"]][$i]].' <span class="gry-color">ML</span></td></tr>';
                }
                $body .= $ligne_forme . '</tbody></table></div>';
        
        $element2 = "";
        if (!empty($_POST["type_banquette"]) || !empty($_POST["type_bois"]) || !empty($_POST["texture_bois"]) || !empty($_POST["tissus_brocard"])) {
            $element2 = '<div style="padding: 1.5rem;">
                <table class="padding text-left small border-bottom">
                    <thead>
                        <tr>
                            <th width="50%" style="background: #f2f2f2;">Titre</th>
                            <th width="50%" style="background: #f2f2f2;">Eléments à intégrer dans le salon</th>
                        </tr>
                    </thead>
                    <tbody class="strong">';
        }

        $body .= (!empty($element2))?$element2:"";
        if (!empty($_POST["type_banquette"])) {
            $body .= '<tr class="strong"><td class="gry-color">Banquettes</td>
                <td class="strong black-color">'.$_POST["type_banquette"].'</td></tr>';
        }
        if (!empty($_POST["type_bois"])) {
            $body .= '<tr class="strong"><td class="gry-color">Bois préférez</td>
                <td class="strong black-color">'.$_POST["type_bois"].'</td></tr>';
        }
        if (!empty($_POST["texture_bois"])) {
            $body .= '<tr class="strong"><td class="gry-color">Texture bois</td>
                <td class="strong black-color">'.$_POST["texture_bois"].'</td></tr>';
        }

        /* this array exploade ou imploade */
        if (!empty($_POST["tissus_brocard"])) {
            $body .= '<tr class="strong"><td class="gry-color">Tissus préférez</td>
                <td class="strong black-color">'.implode(";",$_POST["tissus_brocard"]).'</td></tr>';
        }
        $body .= (!empty($element2))?'</tbody></table></div>':"";
        $element3 = "";
        if (!empty($_POST["table"]) || !empty($_POST["cendrier"]) || !empty($_POST["coin"]) || !empty($_POST["accoudoir"])) {
            $element3 .= '<div style="padding: 1.5rem;">
                <table class="padding text-left small border-bottom">
                    <thead>
                        <tr>
                            <th width="50%" style="background: #f2f2f2;">Eléments et accessoires</th>
                            <th width="25%" style="background: #f2f2f2;">Réf</th>
                            <th width="25%" style="background: #f2f2f2;">Qté</th>
                        </tr>
                    </thead>
                    <tbody class="strong">';
        }
        $body .= (!empty($element3))?$element3:"";

        if (!empty($_POST["table"])) {
            $body .='<tr class="strong">
            <td class="gry-color">Table</td>
            <td class="strong black-color">'.$_POST["table"].'</td>
            <td class="strong black-color">'.$_POST["qte_table"].'</td></tr>';
        }
        if (!empty($_POST["cendrier"])) {
            $body .='<tr class="strong">
            <td class="gry-color">Cendrier</td>
            <td class="strong black-color">'.$_POST["cendrier"].'</td>
            <td class="strong black-color">'.$_POST["qte_cendrier"].'</td></tr>';
        }
        if (!empty($_POST["coin"])) {
            $body .='<tr class="strong">
            <td class="gry-color">Coin</td>
            <td class="strong black-color">'.$_POST["coin"].'</td>
            <td class="strong black-color">'.$_POST["qte_coin"].'</td></tr>';
        }
        if (!empty($_POST["accoudoir"])) {
            $body .='<tr class="strong">
            <td class="gry-color">Accoudoir</td>
            <td class="strong black-color">'.$_POST["accoudoir"].'</td>
            <td class="strong black-color">'.$_POST["qte_accoudoir"].'</td></tr>';
        }
        $body .= '</tbody></table></div>';
        $body .= '<div class="text-center" style="background: #f2f2f2;padding: 1.5rem;"><p>VOTRE COMMANDE</p></div></div></body></html>';
        /* End */



        /* Methode 1 Mail in p-php */

        $email = "YoussefApiwi48@gmail.com";
        $subject = "Demande de Prix " . date("d-m-20y");
        
        if(mail($email, $subject, $body))
        {   
            $status = "success";
        } else {
            $status = "failed";
        }

    

        /* Methode PHPMailer */

/*         $mail = new PHPMailer();
        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "YoussefApiwi48@gmail.com";
        $mail->Password = 'Apiwi@1997-YSF2021';
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("FromCommande@Apiwi.com", $nom);
        $mail->addAddress("YoussefApiwi48@gmail.com");
        $mail->Subject = "Demande de Prix " . date("d-m-20y");
        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
        } else {
            $status = "failed";
        } */

        exit(json_encode(array("status" => $status)));

    } else {
        header('Location: index.html');
        exit;
    }

}