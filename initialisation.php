<?php

session_start();
$_SESSION["panier"] = ["SAMSUNG_GALAXY_S9" => 0, "HUAWEI_P30" => 0, "Apple_iPhone_9" => 0];
header("location: ajout_article.php");
?>
