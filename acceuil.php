<?php

session_start();

if (!isset($_SESSION["name"])) {
    header("location: auth.php");
}

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
        <div class="container col-md-6 mt-5">
            <div class="card">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Bienvenu, <strong class="badge bg-primary"><?php echo $_SESSION['name']; ?></strong> , chez SMI E-Co!!!</h3>
                    <div class="alert alert-primary mb-0" role="alert">
                        <p class="lead mb-0">Votre panier est vide !? <a href="initialisation.php" class="alert-link">Cliquer ici</a> pour le remplir.</p>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt me-1"></i> Déconnexion</a>
                </div>
            </div>
        </div>
        <!-- JS Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>