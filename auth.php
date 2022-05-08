<?php

require_once "db.php";
session_start();

if (isset($_SESSION["name"])) {
    header("location: acceuil.php");
}

$error = false;

if (isset($_POST["login_user"])) {
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $sql = "SELECT * FROM users WHERE name='" . $name . "' AND password='" . md5($password) . "' limit 1";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION["name"] = $_POST["name"];
        $success_message = "Vous vous êtes connecté avec succès.";
        header("Refresh:2 ; URL=acceuil.php");
    } else {
        $error_message = "Identifiant incorrect !";
    }
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
        <title>Formulaire d'authentification</title>
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
            
<?php
if (isset($success_message)) {
    echo "<div class='alert alert-success'><i class='fas fa-check-circle me-1'></i> " . $success_message . "</div>";
}

if (isset($error_message)) {
    echo "<div class='alert alert-danger'><i class='fas fa-exclamation-triangle me-1'></i> " . $error_message . "</div>";
}
?>
			
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                <fieldset>
                    <legend class="h2 mb-4">Identifiez-vous</legend>
					<div class="row mb-3">
                        <label for="name" class="col-sm-4 col-form-label"><i class="fas fa-user-circle me-1"></i> Name <sup class="fw-bold text-danger">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text" id="name" class="form-control" name="name" autofocus required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-4 col-form-label"><i class="fas fa-key me-1"></i> Mot de passe <sup class="fw-bold text-danger">*</sup></label>
                        <div class="col-sm-8">
                            <input type="password" id="password" class="form-control" name="password" required />
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="submit" name="login_user">Se connecter <i class="fas fa-arrow-alt-circle-right ms-1"></i></button>
                        <a href="inscription.php" class="btn btn-dark">S'inscrire <i class="fas fa-plus-circle ms-1"></i></a>
                    </div>
                </fieldset>
            </form>
        </div>
        <!-- JS Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>