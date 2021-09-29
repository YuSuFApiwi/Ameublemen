<?php

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

    $nom = isset($_POST["nom"])?filter_var($_POST["nom"],FILTER_SANITIZE_STRING):"";
    $telephone = isset($_POST["telephone"])?filter_var($_POST["telephone"],FILTER_SANITIZE_NUMBER_INT):"";
    $email = isset($_POST["email"])?filter_var($_POST["email"],FILTER_SANITIZE_EMAIL):"";
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
                    <td class="gry-color">E-mail : <span class="strong black-color">'.$email.'</span></td>
                    <td class="text-right"></td>
                </tr>
                <tr>
                    <td class="gry-color">Adresse : <span class="strong black-color">'.$addresse.'</span></td>
                    <td class="text-right"><span class="strong">N°DP'.random_int(0,99999).'</span></td>
                </tr>
                <tr>
                    <td class="gry-color">Téléphone : <span class="strong black-color">'.$telephone.'</span></td>
                    <td class="text-right gry-color">Date : <span class="strong black-color">'.date("d-m-20y - H:i:s").'</span></td>
                </tr>
        </table></div>
        <div style="padding: 1.5rem;padding-bottom: 0">
            <h3 class="gry-color text-center" style="background: #f2f2f2;padding:10px">Désignation : SALON MODERNE REF <span class="strong black-color">'.$_POST["ref"].'</span></h3>
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
        if (!empty($_POST["tissus_brocard"])) {
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

        /* this array exploade ou imploade */
        if (!empty($_POST["tissus_brocard"])) {
            $body .= '<tr class="strong"><td class="gry-color">Tissus préférez</td>
                <td class="strong black-color">'.implode(";",$_POST["tissus_brocard"]).'</td></tr>';
        }
        $body .= (!empty($element2))?'</tbody></table></div>':"";

        $element3 = "";
        if (!empty($_POST["table"]) || !empty($_POST["accoudoir"])) {
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
        if (!empty($_POST["accoudoir"])) {
            $body .='<tr class="strong">
            <td class="gry-color">Accoudoir</td>
            <td class="strong black-color">'.$_POST["accoudoir"].'</td>
            <td class="strong black-color">'.$_POST["qte_accoudoir"].'</td></tr>';
        }
        $body .= '</tbody></table></div>';
        $body .= '<div class="text-center" style="background: #f2f2f2;padding: 1.5rem;"><p>VOTRE COMMANDE</p></div></div></body></html>';
        /* End */


        /* Methode 1 Mail in php */
        $email_iya = "contact@example.co";
        $headers = "From: Commande <contact@apiwi-multimedia.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset-utf-8";
        
        $subject = "Demande de Prix - (Salone Moderne)";
        
        if(mail($email_iya, $subject, $body,$headers))
        {
            if(email_client($email))
            {
                $status = "success";
                //header('Location:'.$_POST["url"].'?msg_validation=La Demande a été envoyée avec succès&type=success');
                //exit;
            }
        } else {
            $status = "failed";
            //header('Location:'.$_POST["url"].'?msg_validation=Demande non envoyée Renvoyer la dernière fois&type=danger');
            //exit;
        }

        exit(json_encode(array("status" => $status)));

    } else {
        header('Location:www.apiwi-multimedia.com');
        exit;
    }



    function email_client($email)
{
    $body_client = '<html><head>
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
		.gry-color{color:#878f9c;}a{text-decoration:none;}
		.text-upper{text-transform: uppercase;}.text-center{text-align: center;}
		.text-left{text-align:left;}.strong{font-weight: bold;}
	</style>
</head>
<body>
	<div style="margin-left:auto;margin-right:auto;">
		<div style="background: #f2f2f2;padding: 1.5rem;">
			<table>
				<tr>
					<td>
						<img src="images/logo.png" class="text-left" width="130px" height="50px" style="display:inline-block;">
					</td>
				</tr>
			</table>
			<table>
					<tr>
						<td style="font-size: 1rem;" class="text-left text-upper strong">Demande soumise avec succès</td>
						<td class="text-right"></td>
					</tr>
					<tr>
						<td class="gry-color">Date de demande : <span class="strong" style="color: #010;">'.date("d-m-20y - H:i:s").'</span></td>
                    </tr>
			</table></div>
			<div style="margin:0 auto;margin:10px 0 10px 0;">
			    <a href="www.apiwi-multimedia.com" class="text-center black-color" style="padding:10px;background-color:#d90736;">visite site</a>
			</div>
			
			</body></html>';
			
		$subject_client = "Validation Commande - www.apiwi-multimedia.com";
        $headers_client = "From: Commande <contact@apiwi-multimedia.com>\r\n";
        $headers_client .= "MIME-Version: 1.0\r\n";
        $headers_client .= "Content-type: text/html; charset-utf-8";
        
        $subject = "Demande de Prix - Salone Moderne" . date("d-m-20y");
        if(mail($email, $subject_client, $body_client,$headers_client))
        {
            return true;
        } else {
            return false;
        }
}

} else {
    header('Location:www.apiwi-multimedia.com');
    exit;
}