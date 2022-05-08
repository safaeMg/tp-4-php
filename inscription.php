<?php

require_once "db.php";
session_start();

if (isset($_SESSION["name"])) {
    header("location: acceuil.php");
}

$error = false;

if (isset($_POST["register_user"])) {
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $confirm_password = $_POST["confirm_password"];

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = true;
        $uname_error = "Le nom ne doit contenir que des alphabets et des espaces !";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Veuillez saisir une adresse e-mail valide !";
    }

    if (strlen($password) < 6) {
        $error = true;
        $password_error = "Le mot de passe doit comporter au moins 6 caractères !";
    }

    if ($password != $confirm_password) {
        $error = true;
        $cpassword_error = "Le mot de passe et la confirmation du mot de passe ne correspondent pas !";
    }

    // Check the database to make sure
    // a user does not already exist with the same name and/or email
    $query = "SELECT * FROM users WHERE name='$name' OR email='$email' LIMIT 1";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user["name"] === $name) {
            $error_message = "Ce nom est déjà utilisé !";
        }

        if ($user["email"] === $email) {
            $error_message = "Cet e-mail est déjà utilisé !";
        }
    } elseif (strcasecmp($_SESSION["captcha_code"], $_POST["verif_code"]) != 0) {
        $error = true;
        $captcha_error = "Le code captcha que vous avez entré ne correspond pas. Veuillez réessayer.";
    } else {
        // Finally, register user if there are no errors in the form
        if (mysqli_query($con, "INSERT INTO users(name, email, password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
            $success_message = "Votre compte a été créé avec succès.";
            header("Refresh:2 ; URL=auth.php");
        } else {
            $error_message = "Oups! quelque chose ne va pas lors de l'inscription! Veuillez réessayer plus tard!";
        }
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
        <title>Inscription</title>
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
                    <legend class="h2 mb-4">Connectez-vous et profitez de nos meilleur produits</legend>
					<div class="row mb-3">
                        <label for="name" class="col-sm-4 col-form-label"><i class="fas fa-user-circle me-1"></i> Name <sup class="fw-bold text-danger">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text" id="name" class="form-control" name="name" value="<?php if($error) echo $name; ?>" autofocus required />
							<?php if (isset($uname_error)) echo "<div class='text-danger mt-3'><i class='fas fa-exclamation-triangle me-1'></i> ". $uname_error ."</div>"; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label"><i class="fas fa-at me-1"></i> E-mail <sup class="fw-bold text-danger">*</sup></label>
                        <div class="col-sm-8">
                            <input type="email" id="email" class="form-control" name="email" value="<?php if($error) echo $email; ?>" required />
							<?php if (isset($email_error)) echo "<div class='text-danger mt-3'><i class='fas fa-exclamation-triangle me-1'></i> ". $email_error ."</div>"; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-4 col-form-label"><i class="fas fa-key me-1"></i> Mot de passe <sup class="fw-bold text-danger">*</sup></label>
                        <div class="col-sm-8">
                            <input type="password" id="password" class="form-control" name="password" value="" required />
							<?php if (isset($password_error)) echo "<div class='text-danger mt-3'><i class='fas fa-exclamation-triangle me-1'></i> ". $password_error ."</div>"; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="confirm_password" class="col-sm-4 col-form-label"><i class="fas fa-key me-1"></i> Retapez votre MdP <sup class="fw-bold text-danger">*</sup></label>
                        <div class="col-sm-8">
                            <input type="password" id="confirm_password" class="form-control" name="confirm_password" value="" required />
                            <?php if (isset($cpassword_error)) echo "<div class='text-danger mt-3'><i class='fas fa-exclamation-triangle me-1'></i> ". $cpassword_error ."</div>"; ?>
						</div>
                    </div>
                    <div class="row mb-3">
                        <img src="captcha/verif_code_gen.php" class="col-sm-4 col-form-label" alt="code de vérification" />
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="verif_code" value="" required />
							<?php if (isset($captcha_error)) echo "<div class='text-danger mt-3'><i class='fas fa-exclamation-triangle me-1'></i> ". $captcha_error ."</div>"; ?>
                        </div>
                    </div>
					<div class="text-end">
					    <button type="submit" class="btn btn-primary" name="register_user">S'inscrire<i class="fas fa-arrow-alt-circle-right ms-1"></i></button>
                    </div>
				</fieldset>
            </form>
            <p>
				Already a member? <a href="auth.php">Sign in</a>
            </p>
        </div>
        <!-- JS Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>