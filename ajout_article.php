<?php
session_start();

if (!isset($_SESSION["name"])) {
    header("location: auth.php");
}

$panier = $_SESSION["panier"];
if (isset($_GET["ajout"])) {
    switch ($_GET["ajout"]) {
        case "SAMSUNG_GALAXY_S9":
            $panier["SAMSUNG_GALAXY_S9"]++;
            break;
        case "HUAWEI_P30":
            $panier["HUAWEI_P30"]++;
            break;
        case "Apple_iPhone_9":
            $panier["Apple_iPhone_9"]++;
            break;
    }
}
$_SESSION["panier"] = ["SAMSUNG_GALAXY_S9" => $panier["SAMSUNG_GALAXY_S9"], "HUAWEI_P30" => $panier["HUAWEI_P30"], "Apple_iPhone_9" => $panier["Apple_iPhone_9"]];
?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <!-- Required meta tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Project Description" />
        <meta name="author" content="Project Author" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Mon magasin de Smartphone</title>
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" />
        <style>
            body {
                font-family: "Poppins", sans-serif;
            }
        </style>
    </head>
    <body class="bg-light">
        <div class="container col-md-12 mt-5">
            <div class="text-end">
			    <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt me-1"></i> Déconnexion</a>
			</div>
			<hr />
			<div class="table-responsive">
			<table class="table table-info table-bordered border-info mb-0">
			    <thead>
				    <tr>
					    <td>Ajouter</td>
						<td>Votre commande en quantité</td>
					</tr>
				</thead>
				<tbody>
				    <tr>
					    <td><a href="ajout_article.php?ajout=SAMSUNG_GALAXY_S9" class="link-dark">Smartphone SAMSUNG_GALAXY_S9 NOIR <strong class="badge bg-dark">7000 DH</strong></a></td>
						<td><strong class="badge bg-warning"><?php echo $panier["SAMSUNG_GALAXY_S9"]?></strong> <span class="ms-1">SAMSUNG_GALAXY_S9</span></td>
					</tr>
					
				    <tr>
					    <td><a href="ajout_article.php?ajout=HUAWEI_P30" class="link-dark">Smartphone HUAWEI_P30 NOIR <strong class="badge bg-dark">8000 DH</strong></a></td>
						<td><strong class="badge bg-warning"><?php echo $panier["HUAWEI_P30"]?></strong> <span class="ms-1">HUAWEI_P30</span></td>
					</tr>
					
				    <tr>
					    <td><a href="ajout_article.php?ajout=Apple_iPhone_9" class="link-dark">Apple_iPhone_9 <strong class="badge bg-dark">9500 DH</strong></a></td>
						<td><strong class="badge bg-warning"><?php echo $panier["Apple_iPhone_9"]?></strong> <span class="ms-1">Apple_iPhone_9</span></td>
					</tr>
				</tbody>
			</table>
			</div>
			<hr />
            <div class="d-grid gap-3 d-md-flex justify-content-md-end">
			    <a href="initialisation.php" class="btn btn-warning"><i class="fas fa-trash me-1"></i> Vider mon panier</a>
				<a href="calcul_total.php" class="btn btn-primary"><i class="fas fa-calculator me-1"></i> Calculer le total</a>
				<a href="acceuil.php" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left me-1"></i> Retour a la page daccueil</a>
			</div>
        </div>
        <!-- JS Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>