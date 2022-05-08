<?php
session_start();

if (!isset($_SESSION["name"])) {
    header("location: auth.php");
}

$panier = $_SESSION["panier"];
$total = 0;
$total += $panier["SAMSUNG_GALAXY_S9"] * 7000;
$total += $panier["HUAWEI_P30"] * 8000;
$total += $panier["Apple_iPhone_9"] * 9500;
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
        <title>Mon magasin de Smartphones</title>
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
        <div class="container col-md-8 mt-5">
            <div class="card">
                <div class="card-body p-4">
                    <div class="alert alert-primary mb-0" role="alert">
                        <p class="lead mb-0">Le total de votre panier: <strong class="badge bg-primary"><?php echo $total;?> DH</strong></p>
                    </div>
                </div>
            <div class="card-footer p-4 d-grid gap-3 d-md-flex justify-content-md-end">
			    <a href="ajout_article.php" class="btn btn-warning"><i class="fas fa-pen me-1"></i> Modifier mon panier</a>
				<a href="initialisation.php" class="btn btn-danger"><i class="fas fa-trash me-1"></i> Vider mon panier</a>
				<a href="facture.php" class="btn btn-success"><i class="fas fa-check me-1"></i> Confirmer la Commande</a>
			</div>
            </div>
        </div>
        <!-- JS Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>