<?php

session_start();

if (!isset($_SESSION["name"])) {
    header("location: auth.php");
}

$jour = date("d/m/Y");
$duedate = date("d/m/Y", strtotime("+30 days"));

$panier = $_SESSION["panier"];

$n1 = $panier["SAMSUNG_GALAXY_S9"];
$n2 = $panier["HUAWEI_P30"];
$n3 = $panier["Apple_iPhone_9"];

$total1 = $panier["SAMSUNG_GALAXY_S9"] * 7000;
$total2 = $panier["HUAWEI_P30"] * 8000;
$total3 = $panier["Apple_iPhone_9"] * 9500;
$total4 = $total1 + $total2 + $total3;

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
        <title>Facture</title>
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
        <div class="container col-md-8 my-5">
		    <div class="card shadow-sm">
			    <div class="card-header">
					<div class="row align-items-center">
						<div class="col-auto"><h3 class="card-title mb-0">Facture</h3></div>
						<div class="col text-end">
							<ul class="list-inline mb-0">
								<li class="list-inline-item">Date d'établissement <span class="badge bg-info"><?php echo $jour; ?></span></li>
								<li class="list-inline-item">Date d'échéance <span class="badge bg-dark"><?php echo $duedate; ?></span></li>
							    <a href="calcul_total.php" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left me-1"></i> Back</a>
							</ul>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-light table-bordered mb-0">
							<thead>
								<tr>
									<td><strong>Article</strong></td>
									<td><strong>Nombre</strong></td>
									<td><strong>Prix</strong></td>
									<td><strong>Prix * Nombre</strong></td>
								</tr>
							</thead>
							<tbody>
								<?php
								if($total1 != 0) {
									echo "
								<tr>
									<td>Smartphone SAMSUNG_GALAXY_S9 NOIR</td>
									<td><strong class='badge bg-warning'>$n1</strong> <span class='ms-1'>SAMSUNG_GALAXY_S9</span></td>
									<td><strong class='badge bg-primary'>7000 DH</strong></td>
									<td><strong class='badge bg-success'>$total1</span></td>
								</tr>
									";
								} if($total2 != 0) {
									echo "
								<tr>
									<td>Smartphone HUAWEI_P30 NOIR</td>
									<td><strong class='badge bg-warning'>$n2</strong> <span class='ms-1'>HUAWEI_P30</span></td>
									<td><strong class='badge bg-primary'>8000 DH</strong></td>
									<td><strong class='badge bg-success'>$total2</span></td>
								</tr>
									";
								} if($total3 != 0) {
									echo "
								<tr>
									<td>Apple_iPhone_9</td>
									<td><strong class='badge bg-warning'>$n3</strong> <span class='ms-1'>Apple_iPhone_9</span></td>
									<td><strong class='badge bg-primary'>9500 DH</strong></td>
									<td><strong class='badge bg-success'>$total3</span></td>
								</tr>
									";
								}
								?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3" class="text-end"><strong>Le total est:</strong></td>
									<td class="text-center"><strong class="badge bg-success"><?php echo $total4; ?> DH</strong></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="card-footer p-4">
				<p>
				Mentions légales<br/> Pas d'escompte pour paiement anticipé.<br /> Conformément à la loi 92.1142, en cas de retard de paiement, toute somme, y compris l'acompte, non payée à sa date d'éxigibilité produira de plein droit des intérêts de retard équivalents au triple du taux d'intérêt légal de l'année en cours ainsi que le paiement d'une somme forfaitaire de quarante (40) euros due au titre des frais de recouvrement conformément au décret N°2012-1115.
				</p>
				<p class="mb-0"><em>Mode de paiement : virement bancaire (frais bancaires à la charge du client. <br /> SOCIETE D'EPARGNE Ile de France - 19 rue des Artistes - 75001 PARIS<br /> BIC : CEPAFRPP000 <br /> IBAN : FR76 0000 0000 0000 0000 0000 0000 </em></p>
				</div>
			</div>
		</div>
        <!-- JS Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>